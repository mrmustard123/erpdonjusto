<?php
<object class="view_salidas_farmacorp_x_mes" name="view_salidas_farmacorp_x_mes" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Salidas Farmacorp x Mes 2021</property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">370</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_salidas_farmacorp_x_mes</property>
  <property name="Width">597</property>
  <property name="OnBeforeShow">view_salidas_farmacorp_x_mesBeforeShow</property>
  <property name="OnBeforeShowHeader">view_salidas_farmacorp_x_mesBeforeShowHeader</property>
  <property name="OnShow">view_salidas_farmacorp_x_mesShow</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Salidas Farmacorp x Mes 2021</property>
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label1</property>
    <property name="Top">40</property>
    <property name="Width">499</property>
  </object>
  <object class="DBRepeater" name="DBRepeater1" >
    <property name="BorderColor">Black</property>
    <property name="DataSource">Datasource1</property>
    <property name="Height">41</property>
    <property name="Layout">
    <property name="Type">XY_LAYOUT</property>
    </property>
    <property name="Left">20</property>
    <property name="Name">DBRepeater1</property>
    <property name="Top">85</property>
    <property name="Width">291</property>
    <object class="Label" name="Label2" >
      <property name="Caption">Label2</property>
      <property name="DataField">MES</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">22</property>
      <property name="Name">Label2</property>
      <property name="Top">14</property>
      <property name="Width">99</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Label3</property>
      <property name="DataField">monto</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">170</property>
      <property name="Name">Label3</property>
      <property name="Top">14</property>
      <property name="Width">75</property>
    </object>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Mes</property>
    <property name="Height">13</property>
    <property name="Left">42</property>
    <property name="Name">Label4</property>
    <property name="Top">64</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Monto</property>
    <property name="Height">13</property>
    <property name="Left">190</property>
    <property name="Name">Label5</property>
    <property name="Top">64</property>
    <property name="Width">75</property>
  </object>
  <object class="Database" name="dbapicolad_erpdonjusto1" >
        <property name="Left">143</property>
        <property name="Top">150</property>
    <property name="Connected"></property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbapicolad_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">238</property>
        <property name="Top">252</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">354</property>
        <property name="Top">179</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:22:{i:0;s:6:&quot;SELECT&quot;;i:1;s:61:&quot;	MONTH(p.consig_date) as 'MES', YEAR(p.consig_date) AS 'ANO',&quot;;i:2;s:30:&quot;	SUM(p.total_price) AS 'monto'&quot;;i:3;s:4:&quot;FROM&quot;;i:4;s:17:&quot;	consig_prod AS p&quot;;i:5;s:56:&quot;INNER JOIN consignee AS c ON (p.consig_id = c.consig_id)&quot;;i:6;s:5:&quot;WHERE&quot;;i:7;s:18:&quot;	c.account_id IN (&quot;;i:8;s:8:&quot;		SELECT&quot;;i:9;s:13:&quot;			account_id&quot;;i:10;s:6:&quot;		FROM&quot;;i:11;s:10:&quot;			account&quot;;i:12;s:7:&quot;		WHERE&quot;;i:13;s:34:&quot;			account_code LIKE '1.1.2.2.02%'&quot;;i:14;s:2:&quot;	)&quot;;i:15;s:99:&quot;AND p.mov_type = 'SALIDA' AND p.consig_date BETWEEN '2021-01-01 00:00:00' AND '2021-12-31 23:59:59'&quot;;i:16;s:8:&quot;GROUP BY&quot;;i:17;s:21:&quot;	MONTH(p.consig_date)&quot;;i:18;s:8:&quot;ORDER BY&quot;;i:19;s:21:&quot;	MONTH(p.consig_date)&quot;;i:20;s:0:&quot;&quot;;i:21;s:0:&quot;&quot;;}]]></property>
  </object>
</object>
?>
