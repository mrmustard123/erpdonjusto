<?php
<object class="view_pendientes_list" name="view_pendientes_list" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Lista de Pendientes</property>
  <property name="DocType">dtNone</property>
  <property name="Height">533</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_pendientes_list</property>
  <property name="Width">207</property>
  <property name="OnBeforeShowHeader">view_pendientes_listBeforeShowHeader</property>
  <property name="OnShow">view_pendientes_listShow</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Pendientes</property>
    <property name="Height">13</property>
    <property name="Name">Label1</property>
    <property name="Top">44</property>
    <property name="Width">75</property>
  </object>
  <object class="DBRepeater" name="DBRepeater1" >
    <property name="DataSource">dspendientes1</property>
    <property name="Height">147</property>
    <property name="Layout">
    <property name="Type">XY_LAYOUT</property>
    </property>
    <property name="Name">DBRepeater1</property>
    <property name="Top">66</property>
    <property name="Width">202</property>
    <object class="Label" name="fecha1" >
      <property name="Caption">fecha1</property>
      <property name="DataField">fecha</property>
      <property name="Datasource">dspendientes1</property>
      <property name="Height">13</property>
      <property name="Name">fecha1</property>
      <property name="Top">5</property>
      <property name="Width">75</property>
    </object>
    <object class="Memo" name="cuerpo1" >
      <property name="DataField">cuerpo</property>
      <property name="Datasource">dspendientes1</property>
      <property name="Height">121</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">cuerpo1</property>
      <property name="Top">26</property>
      <property name="Width">202</property>
    </object>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">66</property>
        <property name="Top">237</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Datasource" name="dspendientes1" >
        <property name="Left">66</property>
        <property name="Top">329</property>
    <property name="Dataset">tbpendientes1</property>
    <property name="Name">dspendientes1</property>
  </object>
  <object class="Table" name="tbpendientes1" >
        <property name="Left">66</property>
        <property name="Top">282</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="Filter">realizado='N'</property>
    <property name="LimitCount">50</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbpendientes1</property>
    <property name="Order">desc</property>
    <property name="OrderField">fecha</property>
    <property name="TableName">pendiente</property>
  </object>
</object>
?>
