<?php
<object class="view_consign_prod" name="view_consign_prod" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">CONSIGNACIONES</property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">910</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_consign_prod</property>
  <property name="Width">365</property>
  <property name="OnAfterShowFooter">view_consign_prodAfterShowFooter</property>
  <property name="OnShow">view_consign_prodShow</property>
  <property name="OnShowHeader">view_consign_prodShowHeader</property>
  <property name="OnStartBody">view_consign_prodStartBody</property>
  <object class="Panel" name="Panel1" >
    <property name="Height">891</property>
    <property name="Name">Panel1</property>
    <property name="Width">364</property>
    <object class="Label" name="Label1" >
      <property name="Caption"><![CDATA[Consignat&aacute;rio:]]></property>
      <property name="Height">13</property>
      <property name="Name">Label1</property>
      <property name="Top">24</property>
      <property name="Width">139</property>
    </object>
    <object class="ComboBox" name="consig_id1" >
      <property name="Height">18</property>
      <property name="Items">a:0:{}</property>
      <property name="Name">consig_id1</property>
      <property name="Top">44</property>
      <property name="Width">358</property>
      <property name="OnChange">consig_id1Change</property>
    </object>
    <object class="Memo" name="consig_details1" >
      <property name="DataField">consig_details</property>
      <property name="Datasource">dsconsignee2</property>
      <property name="Height">43</property>
      <property name="Left">2</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">consig_details1</property>
      <property name="Top">67</property>
      <property name="Width">275</property>
    </object>
    <object class="Button" name="Button1" >
      <property name="Caption">Modificar</property>
      <property name="Height">25</property>
      <property name="Left">283</property>
      <property name="Name">Button1</property>
      <property name="Top">80</property>
      <property name="Width">75</property>
      <property name="OnClick">Button1Click</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Nuevo movimiento</property>
      <property name="Font">
      <property name="Size">16px</property>
      </property>
      <property name="Height">27</property>
      <property name="Left">2</property>
      <property name="Link">view_consign.php</property>
      <property name="LinkTarget">_self</property>
      <property name="Name">Label2</property>
      <property name="ParentFont">0</property>
      <property name="Top">123</property>
      <property name="Width">219</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption"><![CDATA[Hist&oacute;rico]]></property>
      <property name="Font">
      <property name="Size">16px</property>
      </property>
      <property name="Height">27</property>
      <property name="Left">2</property>
      <property name="Link">../index.php?action=consigprodhistory</property>
      <property name="Name">Label3</property>
      <property name="ParentFont">0</property>
      <property name="Top">160</property>
      <property name="Width">171</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption"><![CDATA[&Uacute;ltimos movimientos:]]></property>
      <property name="Height">13</property>
      <property name="Name">Label4</property>
      <property name="Top">200</property>
      <property name="Width">267</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">Fecha</property>
      <property name="Height">13</property>
      <property name="Name">Label9</property>
      <property name="Top">224</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Caption">Producto</property>
      <property name="Height">13</property>
      <property name="Left">83</property>
      <property name="Name">Label10</property>
      <property name="Top">224</property>
      <property name="Width">51</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">Tiene</property>
      <property name="Height">13</property>
      <property name="Left">160</property>
      <property name="Name">Label7</property>
      <property name="Top">224</property>
      <property name="Width">38</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Caption">Por cobrar</property>
      <property name="Height">13</property>
      <property name="Left">221</property>
      <property name="Name">Label11</property>
      <property name="Top">224</property>
      <property name="Width">59</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Caption">Total Mov.</property>
      <property name="Height">13</property>
      <property name="Left">289</property>
      <property name="Name">Label13</property>
      <property name="Top">224</property>
      <property name="Width">71</property>
    </object>
    <object class="DBRepeater" name="DBRepeater1" >
      <property name="DataSource">Datasource1</property>
      <property name="Height">75</property>
      <property name="Layout">
      <property name="Type">XY_LAYOUT</property>
      </property>
      <property name="Name">DBRepeater1</property>
      <property name="Top">240</property>
      <property name="Width">358</property>
      <object class="Label" name="Label5" >
        <property name="Caption">Label5</property>
        <property name="DataField">consig_date</property>
        <property name="DataSource">Datasource1</property>
        <property name="Height">13</property>
        <property name="Name">Label5</property>
        <property name="Top">7</property>
        <property name="Width">75</property>
      </object>
      <object class="Label" name="Label6" >
        <property name="Caption">Label6</property>
        <property name="DataField">product_name</property>
        <property name="DataSource">Datasource1</property>
        <property name="Height">14</property>
        <property name="Left">83</property>
        <property name="Name">Label6</property>
        <property name="Top">6</property>
        <property name="Width">59</property>
      </object>
      <object class="Label" name="Label14" >
        <property name="Caption">Label14</property>
        <property name="DataField">total_price</property>
        <property name="DataSource">Datasource1</property>
        <property name="Height">13</property>
        <property name="Left">283</property>
        <property name="Name">Label14</property>
        <property name="Top">7</property>
        <property name="Width">53</property>
      </object>
      <object class="Label" name="topay1" >
        <property name="Caption">Label7</property>
        <property name="DataField">balance</property>
        <property name="Datasource">Datasource1</property>
        <property name="Height">13</property>
        <property name="Left">160</property>
        <property name="Name">topay1</property>
        <property name="Top">6</property>
        <property name="Width">42</property>
      </object>
      <object class="Label" name="Label8" >
        <property name="Caption">Label8</property>
        <property name="DataField">topay</property>
        <property name="DataSource">Datasource1</property>
        <property name="Height">13</property>
        <property name="Left">225</property>
        <property name="Name">Label8</property>
        <property name="Top">7</property>
        <property name="Width">42</property>
      </object>
    </object>
  </object>
  <object class="Table" name="consignee_list" >
        <property name="Left">42</property>
        <property name="Top">466</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">consignee_list</property>
    <property name="OrderField">consig_name</property>
    <property name="TableName">consignee</property>
  </object>
  <object class="Datasource" name="dsconsignee1" >
        <property name="Left">66</property>
        <property name="Top">532</property>
    <property name="Dataset">consignee_list</property>
    <property name="Name">dsconsignee1</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">144</property>
        <property name="Top">456</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="HasAutoInc">0</property>
    <property name="LimitCount">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:6:{i:0;s:111:&quot;SELECT  a.consig_date, c.product_name, a.balance, a.topay,  a.total_price  FROM consig_prod AS a, product AS c,&quot;;i:1;s:99:&quot;                (SELECT product_id, MAX(consig_date) AS c_date FROM consig_prod WHERE consig_id = 0&quot;;i:2;s:35:&quot;                GROUP BY product_id&quot;;i:3;s:44:&quot;                ORDER BY consig_date) AS b  &quot;;i:4;s:122:&quot;WHERE (a.product_id = b.product_id) AND (a.consig_date = b.c_date) AND (a.product_id = c.product_id) AND (a.consig_id = 0)&quot;;i:5;s:0:&quot;&quot;;}]]></property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">224</property>
        <property name="Top">520</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">66</property>
        <property name="Top">389</property>
    <property name="Connected"></property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Table" name="tbconsig_prod1" >
        <property name="Left">241</property>
        <property name="Top">395</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbconsig_prod1</property>
    <property name="TableName">consig_prod</property>
  </object>
  <object class="Datasource" name="dsconsig_prod1" >
        <property name="Left">241</property>
        <property name="Top">445</property>
    <property name="Dataset">tbconsig_prod1</property>
    <property name="Name">dsconsig_prod1</property>
  </object>
  <object class="Table" name="tbconsignee1" >
        <property name="Left">97</property>
        <property name="Top">327</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbconsignee1</property>
    <property name="TableName">consignee</property>
  </object>
  <object class="Datasource" name="dsconsignee2" >
        <property name="Left">217</property>
        <property name="Top">329</property>
    <property name="Dataset">tbconsignee1</property>
    <property name="Name">dsconsignee2</property>
  </object>
</object>
?>
