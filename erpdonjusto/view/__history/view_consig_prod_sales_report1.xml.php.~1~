<?php
<object class="ViewConsigSalesProdReport" name="ViewConsigSalesProdReport" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Conteo de productos vendidos</property>
  <property name="DocType">dtNone</property>
  <property name="Height">970</property>
  <property name="IsMaster">0</property>
  <property name="Name">ViewConsigSalesProdReport</property>
  <property name="Width">568</property>
  <property name="OnShowHeader">ViewConsigSalesProdReportShowHeader</property>
  <property name="OnStartBody">ViewConsigSalesProdReportStartBody</property>
  <object class="Button" name="Button1" >
    <property name="Caption">Ejecutar consulta</property>
    <property name="Height">25</property>
    <property name="Left">99</property>
    <property name="Name">Button1</property>
    <property name="Top">320</property>
    <property name="Width">101</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="DBRepeater" name="DBRepeater1" >
    <property name="BorderColor">Black</property>
    <property name="BorderWidth">1</property>
    <property name="DataSource">Datasource1</property>
    <property name="Height">19</property>
    <property name="Layout">
    <property name="Type">XY_LAYOUT</property>
    </property>
    <property name="Left">1</property>
    <property name="Name">DBRepeater1</property>
    <property name="Top">400</property>
    <property name="Width">387</property>
    <object class="Label" name="Label3" >
      <property name="Caption">Label3</property>
      <property name="DataField">product_name</property>
      <property name="DataSource">Datasource1</property>
      <property name="DesignColor">LightGoldenrodYellow</property>
      <property name="Height">13</property>
      <property name="Left">6</property>
      <property name="Name">Label3</property>
      <property name="Top">3</property>
      <property name="Width">219</property>
      <property name="WordWrap">0</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Label4</property>
      <property name="DataField">cantidad</property>
      <property name="DataSource">Datasource1</property>
      <property name="DesignColor">LightGoldenrodYellow</property>
      <property name="Height">13</property>
      <property name="Left">249</property>
      <property name="Name">Label4</property>
      <property name="Top">3</property>
      <property name="Width">43</property>
      <property name="WordWrap">0</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">|</property>
      <property name="DesignColor">LightGoldenrodYellow</property>
      <property name="Height">13</property>
      <property name="Left">233</property>
      <property name="Name">Label7</property>
      <property name="ParentFont">0</property>
      <property name="Top">3</property>
      <property name="Width">11</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">Label8</property>
      <property name="DataField">Total_Bs</property>
      <property name="DataSource">Datasource1</property>
      <property name="DesignColor">LightGoldenrodYellow</property>
      <property name="Height">13</property>
      <property name="Left">312</property>
      <property name="Name">Label8</property>
      <property name="Top">3</property>
      <property name="Width">39</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Alignment">agCenter</property>
      <property name="Caption">|</property>
      <property name="DesignColor">LightGoldenrodYellow</property>
      <property name="Height">13</property>
      <property name="Left">303</property>
      <property name="Name">Label9</property>
      <property name="ParentFont">0</property>
      <property name="Top">3</property>
      <property name="Width">11</property>
    </object>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Producto</property>
    <property name="Height">13</property>
    <property name="Left">1</property>
    <property name="Name">Label5</property>
    <property name="Top">384</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Cantidad</property>
    <property name="Height">13</property>
    <property name="Left">245</property>
    <property name="Name">Label6</property>
    <property name="Top">384</property>
    <property name="Width">43</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Total Bs.</property>
    <property name="Height">13</property>
    <property name="Left">319</property>
    <property name="Name">Label10</property>
    <property name="Top">384</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Ventas por producto</property>
    <property name="Height">13</property>
    <property name="Name">Label11</property>
    <property name="Top">728</property>
    <property name="Width">243</property>
    <property name="OnAfterShow">Label11AfterShow</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">488</property>
        <property name="Top">40</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">488</property>
        <property name="Top">104</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:290:&quot;SELECT p.product_name, SUM(c.cant) AS 'cantidad', SUM(c.unit_price*c.cant) as 'Total_Bs' FROM `consig_prod` AS c INNER JOIN product AS p ON (c.product_id=p.product_id) WHERE c.consig_date BETWEEN '0000-00-00 00:00:00' AND '0000-00-00 00:00:00' AND c.mov_type = 'PAGO' GROUP BY c.product_id;&quot;;}]]></property>
  </object>
</object>
?>
