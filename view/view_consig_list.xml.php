<?php
<object class="view_consig_list" name="view_consig_list" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Consignatarios</property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">4000</property>
  <property name="IsForm">0</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_consig_list</property>
  <property name="Width">983</property>
  <property name="OnCreate">view_consig_listCreate</property>
  <property name="OnShow">view_consig_listShow</property>
  <property name="OnShowHeader">view_consig_listShowHeader</property>
  <object class="DBRepeater" name="DBRepeater1" >
    <property name="BorderColor">black</property>
    <property name="BorderWidth">1</property>
    <property name="DataSource">dsconsignee1</property>
    <property name="Height">83</property>
    <property name="Layout">
    <property name="Type">XY_LAYOUT</property>
    </property>
    <property name="Name">DBRepeater1</property>
    <property name="Style">css/erpdonjusto.css</property>
    <property name="Top">75</property>
    <property name="Width">971</property>
    <object class="Label" name="consig_id1" >
      <property name="Height">13</property>
      <property name="Left">7</property>
      <property name="Name">consig_id1</property>
      <property name="Top">10</property>
      <property name="Width">43</property>
      <property name="OnBeforeShow">consig_id1BeforeShow</property>
    </object>
    <object class="Label" name="consig_name1" >
      <property name="Caption">consig_name1</property>
      <property name="DataField">consig_name</property>
      <property name="Datasource">dsconsignee1</property>
      <property name="Height">13</property>
      <property name="Left">57</property>
      <property name="Name">consig_name1</property>
      <property name="Top">10</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="consig_tel1" >
      <property name="Caption">consig_tel1</property>
      <property name="DataField">consig_tel</property>
      <property name="Datasource">dsconsignee1</property>
      <property name="Height">13</property>
      <property name="Left">138</property>
      <property name="Name">consig_tel1</property>
      <property name="Top">10</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="consig_details1" >
      <property name="Caption">consig_details1</property>
      <property name="DataField">consig_details</property>
      <property name="Datasource">dsconsignee1</property>
      <property name="Height">13</property>
      <property name="Left">220</property>
      <property name="Name">consig_details1</property>
      <property name="Top">11</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="consig_coord1" >
      <property name="Caption">consig_coord1</property>
      <property name="DataField">consig_coord</property>
      <property name="Datasource">dsconsignee1</property>
      <property name="Height">13</property>
      <property name="Left">317</property>
      <property name="Name">consig_coord1</property>
      <property name="Top">11</property>
      <property name="Width">163</property>
    </object>
    <object class="Label" name="consig_addr1" >
      <property name="Caption">consig_addr1</property>
      <property name="DataField">consig_addr</property>
      <property name="Datasource">dsconsignee1</property>
      <property name="Height">13</property>
      <property name="Left">504</property>
      <property name="Name">consig_addr1</property>
      <property name="Top">10</property>
      <property name="Width">456</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Id</property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label1</property>
    <property name="Top">57</property>
    <property name="Width">35</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Nombre</property>
    <property name="Height">13</property>
    <property name="Left">57</property>
    <property name="Name">Label2</property>
    <property name="Top">57</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Telefono</property>
    <property name="Height">13</property>
    <property name="Left">138</property>
    <property name="Name">Label3</property>
    <property name="Top">57</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Detalles</property>
    <property name="Height">13</property>
    <property name="Left">220</property>
    <property name="Name">Label4</property>
    <property name="Top">57</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Coordinadas</property>
    <property name="Height">13</property>
    <property name="Left">317</property>
    <property name="Name">Label5</property>
    <property name="Top">57</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Direccion</property>
    <property name="Height">13</property>
    <property name="Left">504</property>
    <property name="Name">Label6</property>
    <property name="Top">57</property>
    <property name="Width">75</property>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">461</property>
        <property name="Top">342</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Table" name="tbconsignee1" >
        <property name="Left">617</property>
        <property name="Top">348</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="Filter">consig_activo = 'ACTIVO'</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbconsignee1</property>
    <property name="TableName">consignee</property>
  </object>
  <object class="Datasource" name="dsconsignee1" >
        <property name="Left">617</property>
        <property name="Top">398</property>
    <property name="Dataset">tbconsignee1</property>
    <property name="Name">dsconsignee1</property>
  </object>
</object>
?>
