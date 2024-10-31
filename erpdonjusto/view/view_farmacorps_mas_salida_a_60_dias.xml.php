<?php
<object class="view_farmacorp_mas_salida_a_60_dias" name="view_farmacorp_mas_salida_a_60_dias" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption"><![CDATA[FARMACORPS CON MAS SALIDAS A 60 D&Iacute;AS]]></property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">370</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_farmacorp_mas_salida_a_60_dias</property>
  <property name="Width">597</property>
  <property name="OnBeforeShow">view_farmacorp_mas_salida_a_60_diasBeforeShow</property>
  <property name="OnBeforeShowHeader">view_farmacorp_mas_salida_a_60_diasBeforeShowHeader</property>
  <property name="OnCreate">view_farmacorp_mas_salida_a_60_diasCreate</property>
  <property name="OnShow">view_farmacorp_mas_salida_a_60_diasShow</property>
  <object class="Label" name="Label1" >
    <property name="Caption"><![CDATA[Sucursales de Farmacorp con m&aacute;s salidas a 60 d&iacute;as]]></property>
    <property name="Height">27</property>
    <property name="Name">Label1</property>
    <property name="Top">40</property>
    <property name="Width">355</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Sucursal</property>
    <property name="Height">13</property>
    <property name="Name">Label2</property>
    <property name="Top">86</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Monto B$</property>
    <property name="Height">13</property>
    <property name="Left">368</property>
    <property name="Name">Label3</property>
    <property name="Top">86</property>
    <property name="Width">75</property>
  </object>
  <object class="DBRepeater" name="DBRepeater1" >
    <property name="BorderColor">black</property>
    <property name="BorderWidth">1</property>
    <property name="DataSource">Datasource1</property>
    <property name="Height">41</property>
    <property name="Layout">
    <property name="Type">XY_LAYOUT</property>
    </property>
    <property name="Name">DBRepeater1</property>
    <property name="Top">114</property>
    <property name="Width">539</property>
    <object class="Label" name="Label4" >
      <property name="Caption">Label4</property>
      <property name="DataField">consig_name</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">8</property>
      <property name="Name">Label4</property>
      <property name="Top">14</property>
      <property name="Width">291</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Label5</property>
      <property name="DataField">monto</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">368</property>
      <property name="Name">Label5</property>
      <property name="Top">14</property>
      <property name="Width">75</property>
    </object>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">223</property>
        <property name="Top">294</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:23:{i:0;s:6:&quot;SELECT&quot;;i:1;s:15:&quot;	c.consig_name,&quot;;i:2;s:30:&quot;	SUM(p.total_price) AS 'monto'&quot;;i:3;s:4:&quot;FROM&quot;;i:4;s:17:&quot;	consig_prod AS p&quot;;i:5;s:56:&quot;INNER JOIN consignee AS c ON (p.consig_id = c.consig_id)&quot;;i:6;s:5:&quot;WHERE&quot;;i:7;s:18:&quot;	c.account_id IN (&quot;;i:8;s:8:&quot;		SELECT&quot;;i:9;s:13:&quot;			account_id&quot;;i:10;s:6:&quot;		FROM&quot;;i:11;s:10:&quot;			account&quot;;i:12;s:7:&quot;		WHERE&quot;;i:13;s:34:&quot;			account_code LIKE '1.1.2.2.02%'&quot;;i:14;s:2:&quot;	)&quot;;i:15;s:25:&quot;AND p.mov_type = 'SALIDA'&quot;;i:16;s:39:&quot;AND CAST(p.consig_date AS DATE) &gt; CAST(&quot;;i:17;s:41:&quot;	DATE_SUB(NOW(), INTERVAL 60 DAY) AS DATE&quot;;i:18;s:1:&quot;)&quot;;i:19;s:8:&quot;GROUP BY&quot;;i:20;s:14:&quot;	c.consig_name&quot;;i:21;s:8:&quot;ORDER BY&quot;;i:22;s:11:&quot;	monto DESC&quot;;}]]></property>
  </object>
  <object class="Database" name="dbapicolad_erpdonjusto1" >
        <property name="Left">87</property>
        <property name="Top">299</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbapicolad_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">330</property>
        <property name="Top">293</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
</object>
?>
