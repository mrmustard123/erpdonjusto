<?php
<object class="view_bitacora_list" name="view_bitacora_list" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">BITACORA</property>
  <property name="DocType">dtNone</property>
  <property name="Height">439</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_bitacora_list</property>
  <property name="Width">287</property>
  <property name="OnShow">view_bitacora_listShow</property>
  <property name="OnShowHeader">view_bitacora_listShowHeader</property>
  <object class="DBRepeater" name="DBRepeater1" >
    <property name="DataSource">dsbitacora1</property>
    <property name="Height">155</property>
    <property name="Layout">
    <property name="Type">XY_LAYOUT</property>
    </property>
    <property name="Name">DBRepeater1</property>
    <property name="Top">66</property>
    <property name="Width">275</property>
    <object class="Label" name="fecha1" >
      <property name="Caption">fecha1</property>
      <property name="DataField">fecha</property>
      <property name="Datasource">dsbitacora1</property>
      <property name="Height">13</property>
      <property name="Name">fecha1</property>
      <property name="Top">9</property>
      <property name="Width">75</property>
    </object>
    <object class="Memo" name="cuerpo1" >
      <property name="DataField">cuerpo</property>
      <property name="Datasource">dsbitacora1</property>
      <property name="Height">107</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">cuerpo1</property>
      <property name="Top">33</property>
      <property name="Width">269</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Inicio</property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Link">../index.php?action=home</property>
    <property name="Name">Label1</property>
    <property name="Top">8</property>
    <property name="Width">75</property>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">96</property>
        <property name="Top">247</property>
    <property name="Connected"></property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Table" name="tbbitacora1" >
        <property name="Left">56</property>
        <property name="Top">329</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbbitacora1</property>
    <property name="TableName">bitacora</property>
  </object>
  <object class="Datasource" name="dsbitacora1" >
        <property name="Left">152</property>
        <property name="Top">323</property>
    <property name="Dataset">tbbitacora1</property>
    <property name="Name">dsbitacora1</property>
  </object>
</object>
?>
