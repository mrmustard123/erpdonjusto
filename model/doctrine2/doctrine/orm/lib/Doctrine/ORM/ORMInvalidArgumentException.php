<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace Doctrine\ORM;

/**
 * Contains exception messages for all invalid lifecycle state exceptions inside UnitOfWork
 *
 * @author Benjamin Eberlei <kontakt@beberlei.de>
 */
class ORMInvalidArgumentException extends \InvalidArgumentException
{
    /**
     * @param BaseObject $entity
     *
     * @return ORMInvalidArgumentException
     */
    static public function scheduleInsertForManagedEntity($entity)
    {
        return new self("A managed+dirty entity " . self::objToStr($entity) . " can not be scheduled for insertion.");
    }

    /**
     * @param BaseObject $entity
     *
     * @return ORMInvalidArgumentException
     */
    static public function scheduleInsertForRemovedEntity($entity)
    {
        return new self("Removed entity " . self::objToStr($entity) . " can not be scheduled for insertion.");
    }

    /**
     * @param BaseObject $entity
     *
     * @return ORMInvalidArgumentException
     */
    static public function scheduleInsertTwice($entity)
    {
        return new self("Entity " . self::objToStr($entity) . " can not be scheduled for insertion twice.");
    }

    /**
     * @param string $className
     * @param BaseObject $entity
     *
     * @return ORMInvalidArgumentException
     */
    static public function entityWithoutIdentity($className, $entity)
    {
        return new self(
            "The given entity of type '" . $className . "' (".self::objToStr($entity).") has no identity/no " . 
            "id values set. It cannot be added to the identity map."
        );
    }

    /**
     * @param BaseObject $entity
     *
     * @return ORMInvalidArgumentException
     */
    static public function readOnlyRequiresManagedEntity($entity)
    {
        return new self("Only managed entities can be marked or checked as read only. But " . self::objToStr($entity) . " is not");
    }

    /**
     * @param array  $assoc
     * @param BaseObject $entry
     *
     * @return ORMInvalidArgumentException
     */
    static public function newEntityFoundThroughRelationship(array $assoc, $entry)
    {
        return new self("A new entity was found through the relationship '"
                            . $assoc['sourceEntity'] . "#" . $assoc['fieldName'] . "' that was not"
                            . " configured to cascade persist operations for entity: " . self::objToStr($entry) . "."
                            . " To solve this issue: Either explicitly call EntityManager#persist()"
                            . " on this unknown entity or configure cascade persist "
                            . " this association in the mapping for example @ManyToOne(..,cascade={\"persist\"})."
                            . (method_exists($entry, '__toString') ?
                                "":
                                " If you cannot find out which entity causes the problem"
                               ." implement '" . $assoc['targetEntity'] . "#__toString()' to get a clue."));
    }

    /**
     * @param array  $assoc
     * @param BaseObject $entry
     *
     * @return ORMInvalidArgumentException
     */
    static public function detachedEntityFoundThroughRelationship(array $assoc, $entry)
    {
        return new self("A detached entity of type " . $assoc['targetEntity'] . " (" . self::objToStr($entry) . ") "
                        . " was found through the relationship '" . $assoc['sourceEntity'] . "#" . $assoc['fieldName'] . "' "
                        . "during cascading a persist operation.");
    }

    /**
     * @param BaseObject $entity
     *
     * @return ORMInvalidArgumentException
     */
    static public function entityNotManaged($entity)
    {
        return new self("Entity " . self::objToStr($entity) . " is not managed. An entity is managed if its fetched " .
                "from the database or registered as new through EntityManager#persist");
    }

    /**
     * @param BaseObject $entity
     * @param string $operation
     *
     * @return ORMInvalidArgumentException
     */
    static public function entityHasNoIdentity($entity, $operation)
    {
        return new self("Entity has no identity, therefore " . $operation ." cannot be performed. " . self::objToStr($entity));
    }

    /**
     * @param BaseObject $entity
     * @param string $operation
     *
     * @return ORMInvalidArgumentException
     */
    static public function entityIsRemoved($entity, $operation)
    {
        return new self("Entity is removed, therefore " . $operation ." cannot be performed. " . self::objToStr($entity));
    }

    /**
     * @param BaseObject $entity
     * @param string $operation
     *
     * @return ORMInvalidArgumentException
     */
    static public function detachedEntityCannot($entity, $operation)
    {
        return new self("A detached entity was found during " . $operation . " " . self::objToStr($entity));
    }

    /**
     * @param string $context
     * @param mixed  $given
     * @param int    $parameterIndex
     *
     * @return ORMInvalidArgumentException
     */
    public static function invalidObject($context, $given, $parameterIndex = 1)
    {
        return new self($context . ' expects parameter ' . $parameterIndex .
                    ' to be an entity object, '. gettype($given) . ' given.');
    }

    /**
     * @return ORMInvalidArgumentException
     */
    public static function invalidCompositeIdentifier()
    {
        return new self("Binding an entity with a composite primary key to a query is not supported. " .
            "You should split the parameter into the explicit fields and bind them separately.");
    }

    /**
     * @return ORMInvalidArgumentException
     */
    public static function invalidIdentifierBindingEntity()
    {
        return new self("Binding entities to query parameters only allowed for entities that have an identifier.");
    }

    /**
     * Helper method to show an object as string.
     *
     * @param BaseObject $obj
     *
     * @return string
     */
    private static function objToStr($obj)
    {
        return method_exists($obj, '__toString') ? (string)$obj : get_class($obj).'@'.spl_object_hash($obj);
    }
}
