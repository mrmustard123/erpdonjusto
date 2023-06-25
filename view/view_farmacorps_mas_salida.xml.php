<?php
<object class="view_farmacorps_mas_salida" name="view_farmacorps_mas_salida" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption"><![CDATA[FARMACORPS CON M&Aacute;S SALIDAS]]></property>
  <property name="DocType">dtNone</property>
  <property name="Height">370</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_farmacorps_mas_salida</property>
  <property name="Width">597</property>
  <property name="OnBeforeShowHeader">view_farmacorps_mas_salidaBeforeShowHeader</property>
  <property name="OnShow">view_farmacorps_mas_salidaShow</property>
  <object class="DBRepeater" name="DBRepeater1" >
    <property name="BorderColor">Black</property>
    <property name="BorderWidth">1</property>
    <property name="DataSource">Datasource1</property>
    <property name="Height">35</property>
    <property name="Layout">
    <property name="Type">XY_LAYOUT</property>
    </property>
    <property name="Name">DBRepeater1</property>
    <property name="Top">80</property>
    <property name="Width">491</property>
    <object class="Label" name="Label2" >
      <property name="Caption">Label2</property>
      <property name="DataField">consig_name</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">4</property>
      <property name="Name">Label2</property>
      <property name="Top">11</property>
      <property name="Width">347</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Label3</property>
      <property name="DataField">monto</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">400</property>
      <property name="Name">Label3</property>
      <property name="Top">11</property>
      <property name="Width">75</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption"><![CDATA[Sucursales de Farmacorp con m&aacute;s salidas(hist&oacute;rico):]]></property>
    <property name="Height">27</property>
    <property name="Name">Label1</property>
    <property name="Top">32</property>
    <property name="Width">329</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Sucursal:</property>
    <property name="Height">13</property>
    <property name="Name">Label4</property>
    <property name="Top">59</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Monto en B$</property>
    <property name="Height">13</property>
    <property name="Left">400</property>
    <property name="Name">Label5</property>
    <property name="Top">59</property>
    <property name="Width">75</property>
  </object>
  <object class="Database" name="dbapicolad_erpdonjusto1" >
        <property name="Left">137</property>
        <property name="Top">254</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbapicolad_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">359</property>
        <property name="Top">282</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:4:{i:0;s:130:&quot;select c.consig_name, SUM(p.total_price) AS 'monto' from consig_prod as p INNER JOIN consignee as c ON (p.consig_id = c.consig_id)&quot;;i:1;s:121:&quot;WHERE c.account_id IN (SELECT account_id from account WHERE `account_code` LIKE &quot;1.1.2.2.02%&quot;) and p.mov_type = 'SALIDA' &quot;;i:2;s:22:&quot;GROUP BY c.consig_name&quot;;i:3;s:19:&quot;ORDER BY monto DESC&quot;;}]]></property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">262</property>
        <property name="Top">216</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
</object>
?>
