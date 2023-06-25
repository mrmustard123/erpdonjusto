<?php
<object class="view_new_consignee" name="view_new_consignee" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Consignatario</property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">527</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_new_consignee</property>
  <property name="Width">653</property>
  <property name="OnShow">view_new_consigneeShow</property>
  <property name="OnShowHeader">view_new_consigneeShowHeader</property>
  <object class="Button" name="Button1" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Aceptar</property>
    <property name="Height">27</property>
    <property name="Left">24</property>
    <property name="Name">Button1</property>
    <property name="Top">456</property>
    <property name="Width">83</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="LabeledEdit" name="consig_addr1" >
    <property name="DataField">consig_addr</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="EditLabel">
    <property name="Caption">Direccion</property>
    </property>
    <property name="Height">34</property>
    <property name="Left">24</property>
    <property name="Name">consig_addr1</property>
    <property name="Top">179</property>
    <property name="Width">435</property>
  </object>
  <object class="LabeledEdit" name="consig_coord1" >
    <property name="DataField">consig_coord</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="EditLabel">
    <property name="Caption">Coordenadas</property>
    </property>
    <property name="Height">34</property>
    <property name="Left">24</property>
    <property name="Name">consig_coord1</property>
    <property name="Top">229</property>
    <property name="Width">211</property>
  </object>
  <object class="LabeledEdit" name="consig_details1" >
    <property name="DataField">consig_details</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="EditLabel">
    <property name="Caption">Detalles</property>
    </property>
    <property name="Height">34</property>
    <property name="Left">24</property>
    <property name="Name">consig_details1</property>
    <property name="Top">271</property>
    <property name="Width">563</property>
  </object>
  <object class="LabeledEdit" name="consig_name1" >
    <property name="DataField">consig_name</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="EditLabel">
    <property name="Caption">Nombre</property>
    </property>
    <property name="Height">34</property>
    <property name="Left">24</property>
    <property name="Name">consig_name1</property>
    <property name="Top">18</property>
    <property name="Width">403</property>
  </object>
  <object class="LabeledEdit" name="consig_tel1" >
    <property name="DataField">consig_tel</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="EditLabel">
    <property name="Caption">Telefono</property>
    </property>
    <property name="Height">34</property>
    <property name="Left">24</property>
    <property name="Name">consig_tel1</property>
    <property name="Top">118</property>
    <property name="Width">155</property>
  </object>
  <object class="ComboBox" name="consig_activo1" >
    <property name="DataField">consig_activo</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="Height">27</property>
    <property name="ItemIndex">0</property>
    <property name="Items"><![CDATA[a:2:{s:6:&quot;ACTIVO&quot;;s:6:&quot;ACTIVO&quot;;s:8:&quot;INACTIVO&quot;;s:8:&quot;INACTIVO&quot;;}]]></property>
    <property name="Left">24</property>
    <property name="Name">consig_activo1</property>
    <property name="Top">84</property>
    <property name="Width">195</property>
  </object>
  <object class="LabeledEdit" name="code1" >
    <property name="DataField">account_code</property>
    <property name="Datasource">dsaccount1</property>
    <property name="EditLabel">
    <property name="Caption"><![CDATA[C&oacute;digo de la Cta. x cobrar]]></property>
    </property>
    <property name="Height">34</property>
    <property name="Left">24</property>
    <property name="Name">code1</property>
    <property name="Top">332</property>
    <property name="Width">315</property>
  </object>
  <object class="LabeledEdit" name="code2" >
    <property name="DataField">account_code</property>
    <property name="Datasource">dsaccount2</property>
    <property name="EditLabel">
    <property name="Caption"><![CDATA[C&oacute;digo de la Cta. Consignat&aacute;rio]]></property>
    </property>
    <property name="Height">34</property>
    <property name="Left">24</property>
    <property name="Name">code2</property>
    <property name="Top">389</property>
    <property name="Width">371</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Activo</property>
    <property name="Height">18</property>
    <property name="Left">24</property>
    <property name="Name">Label1</property>
    <property name="Top">59</property>
    <property name="Width">77</property>
  </object>
  <object class="Database" name="dbapicolad_erpdonjusto1" >
        <property name="Left">564</property>
        <property name="Top">80</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbapicolad_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Table" name="tbconsignee1" >
        <property name="Left">564</property>
        <property name="Top">130</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbconsignee1</property>
    <property name="TableName">consignee</property>
  </object>
  <object class="Datasource" name="dsconsignee1" >
        <property name="Left">564</property>
        <property name="Top">180</property>
    <property name="Dataset">tbconsignee1</property>
    <property name="Name">dsconsignee1</property>
  </object>
  <object class="Table" name="tbaccount1" >
        <property name="Left">586</property>
        <property name="Top">386</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbaccount1</property>
    <property name="TableName">account</property>
  </object>
  <object class="Datasource" name="dsaccount1" >
        <property name="Left">586</property>
        <property name="Top">436</property>
    <property name="Dataset">tbaccount1</property>
    <property name="Name">dsaccount1</property>
  </object>
  <object class="Table" name="tbaccount2" >
        <property name="Left">497</property>
        <property name="Top">375</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbaccount2</property>
    <property name="TableName">account</property>
  </object>
  <object class="Datasource" name="dsaccount2" >
        <property name="Left">497</property>
        <property name="Top">425</property>
    <property name="Dataset">tbaccount2</property>
    <property name="Name">dsaccount2</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">288</property>
        <property name="Top">80</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query2" >
        <property name="Left">368</property>
        <property name="Top">80</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="Name">Query2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
