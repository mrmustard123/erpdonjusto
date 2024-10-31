<?php
<object class="view_mov_supply_details" name="view_mov_supply_details" baseclass="Page">
  <property name="Action">S</property>
  <property name="Background"></property>
  <property name="Caption">Supply movement details</property>
  <property name="DocType">dtNone</property>
  <property name="Height">550</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_mov_supply_details</property>
  <property name="Width">706</property>
  <property name="OnShow">view_mov_supply_detailsShow</property>
  <property name="OnShowHeader">view_mov_supply_detailsShowHeader</property>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">588</property>
        <property name="Top">424</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Datasource" name="dsQuery1" >
        <property name="Left">600</property>
        <property name="Top">360</property>
    <property name="DataSet">Query1</property>
    <property name="Name">dsQuery1</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">488</property>
        <property name="Top">392</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:125:&quot;SELECT m.*, s.supply_name FROM mov_supply as m INNER JOIN supply as s ON (m.supply_id = s.supply_id) WHERE m.mov_supply_id =?&quot;;}]]></property>
  </object>
  <object class="Shape" name="Shape8" >
    <property name="Brush">
    <property name="Color">#FFFFFF</property>
    </property>
    <property name="Height">36</property>
    <property name="Left">50</property>
    <property name="Name">Shape8</property>
    <property name="Top">264</property>
    <property name="Width">500</property>
  </object>
  <object class="Shape" name="Shape6" >
    <property name="Brush">
    <property name="Color">#FFFFFF</property>
    </property>
    <property name="Height">36</property>
    <property name="Left">50</property>
    <property name="Name">Shape6</property>
    <property name="Top">230</property>
    <property name="Width">500</property>
  </object>
  <object class="Shape" name="Shape2" >
    <property name="Brush">
    <property name="Color">#FFFFFF</property>
    </property>
    <property name="Height">36</property>
    <property name="Left">50</property>
    <property name="Name">Shape2</property>
    <property name="Top">128</property>
    <property name="Width">500</property>
  </object>
  <object class="Shape" name="Shape3" >
    <property name="Brush">
    <property name="Color">#FFFFFF</property>
    </property>
    <property name="Height">36</property>
    <property name="Left">50</property>
    <property name="Name">Shape3</property>
    <property name="Top">162</property>
    <property name="Width">500</property>
  </object>
  <object class="Shape" name="Shape4" >
    <property name="Brush">
    <property name="Color">#FFFFFF</property>
    </property>
    <property name="Height">36</property>
    <property name="Left">50</property>
    <property name="Name">Shape4</property>
    <property name="Top">196</property>
    <property name="Width">500</property>
  </object>
  <object class="Shape" name="Shape5" >
    <property name="Brush">
    <property name="Color">#FFFFFF</property>
    </property>
    <property name="Height">36</property>
    <property name="Left">50</property>
    <property name="Name">Shape5</property>
    <property name="Top">61</property>
    <property name="Width">500</property>
  </object>
  <object class="Shape" name="Shape1" >
    <property name="Brush">
    <property name="Color">#FFFFFF</property>
    </property>
    <property name="Height">36</property>
    <property name="Left">50</property>
    <property name="Name">Shape1</property>
    <property name="Top">95</property>
    <property name="Width">500</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Alignment">agRight</property>
    <property name="Caption">ID:</property>
    <property name="Height">13</property>
    <property name="Left">107</property>
    <property name="Name">Label1</property>
    <property name="Top">68</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Label2</property>
    <property name="DataField">mov_supply_id</property>
    <property name="DataSource">dsQuery1</property>
    <property name="Height">13</property>
    <property name="Left">192</property>
    <property name="Name">Label2</property>
    <property name="Top">68</property>
    <property name="Width">150</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Alignment">agRight</property>
    <property name="Caption">CANTIDAD</property>
    <property name="Height">13</property>
    <property name="Left">107</property>
    <property name="Name">Label3</property>
    <property name="Top">139</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Label4</property>
    <property name="DataField">mov_supply_cant</property>
    <property name="DataSource">dsQuery1</property>
    <property name="Height">13</property>
    <property name="Left">192</property>
    <property name="Name">Label4</property>
    <property name="Top">139</property>
    <property name="Width">235</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Alignment">agRight</property>
    <property name="Caption">INSUMO:</property>
    <property name="Height">13</property>
    <property name="Left">107</property>
    <property name="Name">Label5</property>
    <property name="Top">174</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Label6</property>
    <property name="DataField">supply_name</property>
    <property name="DataSource">dsQuery1</property>
    <property name="Height">19</property>
    <property name="Left">192</property>
    <property name="Name">Label6</property>
    <property name="Top">174</property>
    <property name="Width">475</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Alignment">agRight</property>
    <property name="Caption">TIPO MOV.:</property>
    <property name="Height">13</property>
    <property name="Left">107</property>
    <property name="Name">Label7</property>
    <property name="Top">209</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Label8</property>
    <property name="DataField">mov_supply_type</property>
    <property name="DataSource">dsQuery1</property>
    <property name="Height">13</property>
    <property name="Left">192</property>
    <property name="Name">Label8</property>
    <property name="Top">209</property>
    <property name="Width">150</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Alignment">agRight</property>
    <property name="Caption">LOTE:</property>
    <property name="Height">13</property>
    <property name="Left">107</property>
    <property name="Name">Label9</property>
    <property name="Top">245</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Label10</property>
    <property name="DataField">mov_supply_lot</property>
    <property name="DataSource">dsQuery1</property>
    <property name="Height">13</property>
    <property name="Left">192</property>
    <property name="Name">Label10</property>
    <property name="Top">245</property>
    <property name="Width">150</property>
  </object>
  <object class="Label" name="lblTitulo" >
    <property name="Caption">FICHA DE MOVIMIENTO DE ALMACEN DE MATERIALES INDIRECTOS</property>
    <property name="Height">13</property>
    <property name="Left">125</property>
    <property name="Name">lblTitulo</property>
    <property name="Top">32</property>
    <property name="Width">348</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Alignment">agRight</property>
    <property name="Caption">FECHA:</property>
    <property name="Height">13</property>
    <property name="Left">107</property>
    <property name="Name">Label13</property>
    <property name="Top">103</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">Label14</property>
    <property name="DataField">mov_supply_date</property>
    <property name="DataSource">dsQuery1</property>
    <property name="Height">13</property>
    <property name="Left">192</property>
    <property name="Name">Label14</property>
    <property name="Top">103</property>
    <property name="Width">150</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Alignment">agRight</property>
    <property name="Caption">COMENTARIOS:</property>
    <property name="Height">13</property>
    <property name="Left">107</property>
    <property name="Name">Label15</property>
    <property name="Top">278</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Label16</property>
    <property name="DataField">comments</property>
    <property name="DataSource">dsQuery1</property>
    <property name="Height">13</property>
    <property name="Left">192</property>
    <property name="Name">Label16</property>
    <property name="Top">278</property>
    <property name="Width">347</property>
  </object>
</object>
?>
