<?php
<object class="view_pendientes" name="view_pendientes" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">PENDIENTES</property>
  <property name="DocType">dtNone</property>
  <property name="Height">544</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_pendientes</property>
  <property name="Width">203</property>
  <property name="OnBeforeShowHeader">view_pendientesBeforeShowHeader</property>
  <property name="OnShow">view_pendientesShow</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Pendientes</property>
    <property name="Height">13</property>
    <property name="Name">Label1</property>
    <property name="Top">44</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="btnGravar" >
    <property name="Caption">Gravar</property>
    <property name="Height">25</property>
    <property name="Left">96</property>
    <property name="Name">btnGravar</property>
    <property name="TabOrder">3</property>
    <property name="Tag">2</property>
    <property name="Top">384</property>
    <property name="Width">75</property>
    <property name="OnClick">btnGravarClick</property>
  </object>
  <object class="Memo" name="cuerpo1" >
    <property name="DataField">cuerpo</property>
    <property name="Datasource">dspendientes1</property>
    <property name="Height">227</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">cuerpo1</property>
    <property name="TabOrder">2</property>
    <property name="Top">129</property>
    <property name="Width">191</property>
  </object>
  <object class="DateTimePicker" name="DateTimePicker1" >
    <property name="Caption">DateTimePicker1</property>
    <property name="Height">17</property>
    <property name="Name">DateTimePicker1</property>
    <property name="Top">72</property>
    <property name="Width">200</property>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">68</property>
        <property name="Top">426</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Table" name="tbpendientes1" >
        <property name="Left">60</property>
        <property name="Top">300</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">0</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbpendientes1</property>
    <property name="TableName">pendiente</property>
  </object>
  <object class="Datasource" name="dspendientes1" >
        <property name="Left">52</property>
        <property name="Top">366</property>
    <property name="Dataset">tbpendientes1</property>
    <property name="Name">dspendientes1</property>
  </object>
</object>
?>
