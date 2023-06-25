<?php
<object class="view_pend_empresa" name="view_pend_empresa" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Pendientes Empresa</property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">544</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_pend_empresa</property>
  <property name="Width">597</property>
  <property name="OnBeforeShowHeader">view_pend_empresaBeforeShowHeader</property>
  <object class="DBGrid" name="pend_empresa1" >
    <property name="Columns">a:0:{}</property>
    <property name="Datasource">dspend_empresa1</property>
    <property name="Height">200</property>
    <property name="Left">11</property>
    <property name="Name">pend_empresa1</property>
    <property name="Top">225</property>
    <property name="Width">557</property>
  </object>
  <object class="Edit" name="cuerpo1" >
    <property name="DataField">cuerpo</property>
    <property name="Datasource">dspend_empresa2</property>
    <property name="Height">21</property>
    <property name="Left">11</property>
    <property name="Name">cuerpo1</property>
    <property name="Top">85</property>
    <property name="Width">387</property>
  </object>
  <object class="Edit" name="responsable1" >
    <property name="DataField">responsable</property>
    <property name="Datasource">dspend_empresa2</property>
    <property name="Height">21</property>
    <property name="Left">11</property>
    <property name="Name">responsable1</property>
    <property name="Top">146</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Pendiente:</property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label1</property>
    <property name="Top">69</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Responsable:</property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label2</property>
    <property name="Top">127</property>
    <property name="Width">75</property>
  </object>
  <object class="DateTimePicker" name="DateTimePicker1" >
    <property name="Caption">DateTimePicker1</property>
    <property name="Height">17</property>
    <property name="Left">11</property>
    <property name="Name">DateTimePicker1</property>
    <property name="Top">34</property>
    <property name="Width">200</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Fecha:</property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">Label3</property>
    <property name="Top">16</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Adicionar</property>
    <property name="Height">25</property>
    <property name="Left">136</property>
    <property name="Name">Button1</property>
    <property name="Top">184</property>
    <property name="Width">75</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="Button" name="Button2" >
    <property name="Caption">Limpiar</property>
    <property name="Height">25</property>
    <property name="Left">24</property>
    <property name="Name">Button2</property>
    <property name="Top">184</property>
    <property name="Width">75</property>
    <property name="OnClick">Button2Click</property>
  </object>
  <object class="Button" name="Button3" >
    <property name="Caption">Refrescar</property>
    <property name="Height">25</property>
    <property name="Left">440</property>
    <property name="Name">Button3</property>
    <property name="Top">432</property>
    <property name="Width">75</property>
    <property name="OnClick">Button3Click</property>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">315</property>
        <property name="Top">465</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Table" name="tbpend_empresa1" >
        <property name="Left">51</property>
        <property name="Top">467</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="Filter">realizado = 'N'</property>
    <property name="LimitCount">100</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbpend_empresa1</property>
    <property name="TableName">pend_empresa</property>
  </object>
  <object class="Datasource" name="dspend_empresa1" >
        <property name="Left">163</property>
        <property name="Top">469</property>
    <property name="Dataset">tbpend_empresa1</property>
    <property name="Name">dspend_empresa1</property>
  </object>
  <object class="Table" name="tbpend_empresa2" >
        <property name="Left">476</property>
        <property name="Top">46</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbpend_empresa2</property>
    <property name="TableName">pend_empresa</property>
  </object>
  <object class="Datasource" name="dspend_empresa2" >
        <property name="Left">476</property>
        <property name="Top">120</property>
    <property name="Dataset">tbpend_empresa2</property>
    <property name="Name">dspend_empresa2</property>
  </object>
</object>
?>
