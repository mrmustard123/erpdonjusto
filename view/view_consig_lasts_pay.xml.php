<?php
<object class="view_consig_lasts_pay" name="view_consig_lasts_pay" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Ultimos pagos de consignatarios</property>
  <property name="DocType">dtNone</property>
  <property name="Height">525</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_consig_lasts_pay</property>
  <property name="Width">640</property>
  <property name="OnShow">view_consig_lasts_payShow</property>
  <property name="OnShowHeader">view_consig_lasts_payShowHeader</property>
  <object class="DBRepeater" name="DBRepeater1" >
    <property name="BorderColor">Black</property>
    <property name="BorderWidth">1</property>
    <property name="DataSource">Datasource1</property>
    <property name="Height">67</property>
    <property name="Layout">
    <property name="Type">XY_LAYOUT</property>
    </property>
    <property name="Name">DBRepeater1</property>
    <property name="Top">64</property>
    <property name="Width">627</property>
    <object class="Label" name="Label1" >
      <property name="Caption">Label1</property>
      <property name="DataField">consig_date</property>
      <property name="DataSource">Datasource1</property>
      <property name="FormatAsDate">Y-m-d</property>
      <property name="Height">13</property>
      <property name="Name">Label1</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Label2</property>
      <property name="DataField">consig_name</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">96</property>
      <property name="Name">Label2</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Label4</property>
      <property name="DataField">product_name</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">184</property>
      <property name="Name">Label4</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Label5</property>
      <property name="DataField">cant</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">272</property>
      <property name="Name">Label5</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Label6</property>
      <property name="DataField">comments</property>
      <property name="DataSource">Datasource1</property>
      <property name="Height">13</property>
      <property name="Left">384</property>
      <property name="Name">Label6</property>
      <property name="Top">8</property>
      <property name="Width">227</property>
    </object>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">77</property>
        <property name="Top">161</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">112</property>
        <property name="Top">232</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">112</property>
        <property name="Top">312</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:5:{i:0;s:191:&quot;  SELECT h.consig_date, h.consig_name, h.product_name,h.cant, h.comments FROM (SELECT g.consig_name,r.*, p.product_name FROM consig_prod	r INNER JOIN consignee g ON (r.consig_id=g.consig_id) &quot;;i:1;s:59:&quot; INNER JOIN product p ON (p.product_id=r.product_id)) AS h,&quot;;i:2;s:119:&quot;   (SELECT consig_id,  MAX(consig_date) AS consig_date FROM consig_prod WHERE mov_type='PAGO' GROUP BY consig_id) AS i &quot;;i:3;s:35:&quot;	WHERE h.consig_date=i.consig_date &quot;;i:4;s:25:&quot;ORDER BY consig_date DESC&quot;;}]]></property>
  </object>
</object>
?>
