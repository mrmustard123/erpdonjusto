<?php
<object class="view_get_consig_prod" name="view_get_consig_prod" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">view_get_consig_prod</property>
  <property name="DocType">dtNone</property>
  <property name="Height">370</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_get_consig_prod</property>
  <property name="Width">597</property>
  <property name="OnShow">view_get_consig_prodShow</property>
  <property name="OnShowHeader">view_get_consig_prodShowHeader</property>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">418</property>
        <property name="Top">51</property>
    <property name="Connected"></property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">424</property>
        <property name="Top">136</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:91:&quot;SELECT * FROM consig_prod WHERE consig_id = 0  AND product_id = 0 ORDER BY consig_date DESC&quot;;}]]></property>
  </object>
</object>
?>
