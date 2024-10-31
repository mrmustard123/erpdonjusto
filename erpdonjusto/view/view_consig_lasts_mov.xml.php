<?php
<object class="view_consig_lasts_mov" name="view_consig_lasts_mov" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Consignaciones ultimos movimientos</property>
  <property name="DocType">dtNone</property>
  <property name="Height">1200</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_consig_lasts_mov</property>
  <property name="Width">783</property>
  <property name="OnShow">view_consig_lasts_movShow</property>
  <property name="OnShowHeader">view_consig_lasts_movShowHeader</property>
  <object class="DBRepeater" name="DBRepeater1" >
    <property name="BorderColor">Black</property>
    <property name="BorderWidth">1</property>
    <property name="DataSource">Datasource1</property>
    <property name="Height">75</property>
    <property name="Layout">
    <property name="Type">XY_LAYOUT</property>
    </property>
    <property name="Name">DBRepeater1</property>
    <property name="Top">59</property>
    <property name="Width">782</property>
    <object class="Label" name="Label1" >
      <property name="Caption">Label1</property>
      <property name="DataField">consig_date</property>
      <property name="DataSource">Datasource1</property>
      <property name="FormatAsDate">Y-m-d</property>
      <property name="Height">13</property>
      <property name="Name">Label1</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Label2</property>
      <property name="DataField">consig_name</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">91</property>
      <property name="Name">Label2</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Label3</property>
      <property name="DataField">product_name</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">177</property>
      <property name="Name">Label3</property>
      <property name="Width">99</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Label5</property>
      <property name="DataField">mov_type</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">348</property>
      <property name="Name">Label5</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Label6</property>
      <property name="DataField">cant</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">432</property>
      <property name="Name">Label6</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">Label7</property>
      <property name="DataField">comments</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">516</property>
      <property name="Name">Label7</property>
      <property name="Width">75</property>
    </object>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">548</property>
        <property name="Top">136</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">553</property>
        <property name="Top">200</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">541</property>
        <property name="Top">267</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:5:{i:0;s:202:&quot;  SELECT h.consig_date, h.consig_name, h.product_name,h.mov_type,h.cant, h.comments FROM (SELECT g.consig_name,r.*, p.product_name FROM consig_prod	r INNER JOIN consignee g ON (r.consig_id=g.consig_id) &quot;;i:1;s:59:&quot; INNER JOIN product p ON (p.product_id=r.product_id)) AS h,&quot;;i:2;s:105:&quot;   (SELECT consig_id,  MAX(consig_date) AS consig_date FROM consig_prod WHERE 1 GROUP BY consig_id) AS i &quot;;i:3;s:35:&quot;	WHERE h.consig_date=i.consig_date &quot;;i:4;s:25:&quot;ORDER BY consig_date DESC&quot;;}]]></property>
  </object>
</object>
?>
