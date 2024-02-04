/*
Navicat MySQL Data Transfer

Source Server         : apicolad_erpdonjusto_local
Source Server Version : 50643
Source Host           : localhost:3306
Source Database       : apicolad_erpdonjusto

Target Server Type    : MYSQL
Target Server Version : 50643
File Encoding         : 65001

Date: 2024-02-03 21:49:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `account`
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `account_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `account_code` char(255) NOT NULL,
  `name` char(255) NOT NULL,
  `account_type` varchar(300) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `idx_code01` (`account_code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=841 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES ('103', '1', 'ACTIVOS', 'General', null);
INSERT INTO `account` VALUES ('104', '1.1', 'Activo Corriente', 'General', null);
INSERT INTO `account` VALUES ('105', '1.1.1', 'Activo Disponible', 'General', null);
INSERT INTO `account` VALUES ('106', '1.1.1.1', 'Caja General', 'Grupo', null);
INSERT INTO `account` VALUES ('107', '1.1.1.1.01', 'Caja General', 'Subgrupo', null);
INSERT INTO `account` VALUES ('108', '1.1.1.1.01.001', 'Caja General', 'Apropiacion', null);
INSERT INTO `account` VALUES ('109', '1.1.1.1.02', 'Caja Chica', 'Subgrupo', null);
INSERT INTO `account` VALUES ('113', '1.1.1.1.04.001', 'Caja de Ahorro BMSC 4029553457(no se usa)', 'Apropiacion', null);
INSERT INTO `account` VALUES ('120', '1.1.2', 'Activo Exigible', 'General', null);
INSERT INTO `account` VALUES ('121', '1.1.2.1', 'Cuentas por Cobrar', 'Grupo', null);
INSERT INTO `account` VALUES ('122', '1.1.2.1.01', 'Cuentas por Cobrar General', 'Subgrupo', null);
INSERT INTO `account` VALUES ('123', '1.1.2.1.01.001', 'Cuentas por Cobrar a Eli', 'Apropiacion', null);
INSERT INTO `account` VALUES ('124', '1.1.2.1.01.002', 'Cuentas por Cobrar a Leo', 'Apropiacion', null);
INSERT INTO `account` VALUES ('126', '2', 'PASIVO', 'General', null);
INSERT INTO `account` VALUES ('127', '2.1', 'Pasivo Corriente', 'General', null);
INSERT INTO `account` VALUES ('128', '2.1.1', 'Pasivo Corriente', 'General', null);
INSERT INTO `account` VALUES ('129', '2.1.1.1', 'Cuentas por pagar', 'Grupo', null);
INSERT INTO `account` VALUES ('130', '2.1.1.1.01', 'Cuentas por pagar', 'Subgrupo', null);
INSERT INTO `account` VALUES ('131', '2.1.1.1.01.001', 'Cuentas por pagar a Leo', 'Apropiacion', null);
INSERT INTO `account` VALUES ('132', '2.1.1.1.01.002', 'Cuentas por pagar a Eli', 'Apropiacion', null);
INSERT INTO `account` VALUES ('136', '2.1.1.5', 'Impuestos por pagar', 'Grupo', null);
INSERT INTO `account` VALUES ('137', '2.1.1.5.01', 'Impuesto por pagar', 'Subgrupo', null);
INSERT INTO `account` VALUES ('138', '2.1.1.5.01.001', 'IT por pagar', 'Apropiacion', null);
INSERT INTO `account` VALUES ('142', '3', 'PATRIMONIO', 'General', null);
INSERT INTO `account` VALUES ('143', '3.1', 'Patrimonio', 'General', null);
INSERT INTO `account` VALUES ('144', '3.1.1', 'Patrimonio', 'General', null);
INSERT INTO `account` VALUES ('145', '3.1.1.1', 'Patrimonio', 'Grupo', null);
INSERT INTO `account` VALUES ('146', '3.1.1.1.01', 'Capital Social', 'Subgrupo', null);
INSERT INTO `account` VALUES ('147', '3.1.1.1.01.001', 'Capital Socio Leonardo Téllez', 'Apropiacion', null);
INSERT INTO `account` VALUES ('148', '4', 'INGRESOS', 'General', null);
INSERT INTO `account` VALUES ('149', '4.1', 'Ingresos', 'General', null);
INSERT INTO `account` VALUES ('150', '4.1.1', 'Ingresos', 'General', null);
INSERT INTO `account` VALUES ('151', '4.1.1.1', 'Ingresos', 'Grupo', null);
INSERT INTO `account` VALUES ('152', '4.1.1.1.01', 'Ingresos Ordinarios', 'Subgrupo', null);
INSERT INTO `account` VALUES ('153', '4.1.1.1.01.001', 'Venta de Productos Terminados', 'Apropiacion', null);
INSERT INTO `account` VALUES ('164', '7', 'COSTOS', 'General', null);
INSERT INTO `account` VALUES ('165', '7.1', 'Costos de Operación', 'General', null);
INSERT INTO `account` VALUES ('166', '7.1.1', 'Costos de Operación', 'General', null);
INSERT INTO `account` VALUES ('167', '7.1.1.1', 'Costos de Operación', 'Grupo', null);
INSERT INTO `account` VALUES ('168', '7.1.1.1.01', 'Costos de Operación', 'Subgrupo', null);
INSERT INTO `account` VALUES ('169', '7.1.4.2.02.013', 'Pasajes y Viaticos', 'Apropiacion', 'Comida, desayuno, etc.');
INSERT INTO `account` VALUES ('170', '7.1.4.2.02.020', 'Gasolina', 'Apropiacion', null);
INSERT INTO `account` VALUES ('171', '7.1.4.2.02.021', 'Aceites y lubricantes', 'Apropiacion', null);
INSERT INTO `account` VALUES ('172', '7.1.4.2.02.022', 'Insumos para alimento', 'Apropiacion', null);
INSERT INTO `account` VALUES ('179', '7.1.4.1.04.023', 'Material de aseo produccion', 'Apropiacion', null);
INSERT INTO `account` VALUES ('180', '7.1.4.2.02.024', 'Honorarios de ayudante', 'Apropiacion', null);
INSERT INTO `account` VALUES ('182', '7.1.4.1.04.025', 'Insumos de produccion', 'Apropiacion', 'Alcohol 70%, agua destilada');
INSERT INTO `account` VALUES ('209', '1.1.3', 'Activo Realizable', 'General', null);
INSERT INTO `account` VALUES ('210', '7.1.4.2.02.026', 'Peajes', 'Apropiacion', 'Peajes que se paga en los viajes');
INSERT INTO `account` VALUES ('213', '1.1.3.1', 'Inventario de Productos', 'Grupo', '');
INSERT INTO `account` VALUES ('214', '1.1.3.1.01', 'Inventario de Productos Terminados', 'Subgrupo', '');
INSERT INTO `account` VALUES ('215', '1.1.3.1.01.001', 'Spray de miel de apis mellifera 60ml', 'Apropiacion', null);
INSERT INTO `account` VALUES ('216', '1.1.3.1.01.002', 'Spray de miel de apis melliponica 60ml', 'Apropiacion', null);
INSERT INTO `account` VALUES ('217', '1.1.3.1.01.003', 'Lustradores de cera', 'Apropiacion', null);
INSERT INTO `account` VALUES ('218', '1.1.3.1.01.004', 'Miel con propoleo de 250 gr.(propomiel)', 'Apropiacion', null);
INSERT INTO `account` VALUES ('219', '1.1.3.1.01.005', 'Miel con polen y propóleo(apienergetico) 250gr.', 'Apropiacion', null);
INSERT INTO `account` VALUES ('220', '1.1.3.1.01.006', 'Crema de propoleo 28ml', 'Apropiacion', ' Cremita a base de propoleo, vaselina y lanolina');
INSERT INTO `account` VALUES ('222', '1.1.3.1.01.007', 'Gotero de Propoleo 20 ml.', 'Apropiación', null);
INSERT INTO `account` VALUES ('225', '7.1.1.1.01.027', 'Tramites', 'Apropiacion', ' Gastos en tr?mites');
INSERT INTO `account` VALUES ('226', '2.1.1.1.01.003', 'Cuentas por pagar a Mariney', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('227', '1.2', 'Activo No Corriente', 'General', ' ');
INSERT INTO `account` VALUES ('228', '1.2.1', 'Activo Fijo', 'General', ' ');
INSERT INTO `account` VALUES ('230', '1.2.1.4', 'Maquinaria y Equipos', 'Grupo', ' ');
INSERT INTO `account` VALUES ('231', '1.2.1.4.01.001', 'Maquinaria y Equipos', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('232', '1.1.2.1.01.003', 'Cuentas por Cobrar a Clientes', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('233', '2.1.1.3', 'Obligaciones con el personal', 'Grupo', ' ');
INSERT INTO `account` VALUES ('234', '2.1.1.3.01', 'Obligaciones con el personal', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('235', '2.1.1.3.01.001', 'Sueldos y salarios por pagar', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('236', '1.2.1.4.01', 'Maquinarias y Equipos', 'Subgrupo', null);
INSERT INTO `account` VALUES ('237', '1.1.2.4', 'Prestamos y Anticipos al Personal', 'Grupo', ' ');
INSERT INTO `account` VALUES ('238', '1.1.2.4.01', 'Prestamos y Anticipos al Personal', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('239', '1.1.2.4.01.001', 'Prest./Anticipo a Leonardo Tellez', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('240', '1.1.2.4.01.002', 'Prest./Anticipo a Eliana Tellez', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('241', '7.1.1.1.01.028', 'Mantenimiento BMSC Cta. 4029553457', 'Apropiacion', 'Gastos de mantenimiento de la cuenta en el banco Mercantil Santa Cruz');
INSERT INTO `account` VALUES ('242', '1.1.2.3.01.001', 'Intereses por cobrar a BMSC', 'Apropiacion', ' Intereses ganados BMSC');
INSERT INTO `account` VALUES ('243', '1.1.2.2.01.001', 'Consignaciones Eliana', 'Apropiacion', '');
INSERT INTO `account` VALUES ('244', '1.1.1.1.02.002', 'Caja Chica Eliana', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('245', '1.1.1.1.02.003', 'Caja Chica Leonardo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('246', '1.1.3.1.02', 'Inventario de Productos Defectuosos', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('247', '1.1.3.1.02.001', 'Def. Spray de miel de apis mellifera', 'Apropiacion', ' Producto defectuoso (spray)');
INSERT INTO `account` VALUES ('248', '1.1.3.1.03', 'Inventario de Productos en Proceso', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('249', '1.1.3.1.03.001', 'Proc. Spray de miel de apis mellifera', 'Apropiacion', ' Producto en proceso (spray)');
INSERT INTO `account` VALUES ('251', '1.1.3.2.01.001', 'Envases de spray 60 ml', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('252', '1.1.3.2.01.002', 'Frasco de gotero 20 ml', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('253', '1.1.3.2.01.003', 'Frasco de vidrio de 212 ml', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('254', '1.1.3.2.01.004', 'Frasco de vidrio de 460ml.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('255', '7.1.1.1.01.029', 'Descuentos', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('256', '1.1.3.1.01.008', 'Spray de propoleo y vira-vira(odontologico)', 'Apropiacion', 'Spray de prop?leo y vira-vira para uso odontol?gico ');
INSERT INTO `account` VALUES ('257', '3.1.2', 'Reserva Revaluos Tecnicos', 'General', ' ');
INSERT INTO `account` VALUES ('258', '3.1.2.1', 'Reserva Revaluos Tecnicos', 'Grupo', ' ');
INSERT INTO `account` VALUES ('259', '3.1.2.1.01', 'Reserva Revaluos Tecnicos', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('260', '3.1.2.1.01.001', 'Reserva Revaluos Tecnicos', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('261', '3.1.3', 'Ajuste Global al Patrimonio', 'General', ' ');
INSERT INTO `account` VALUES ('262', '3.1.3.1', 'Ajuste Global al Patrimonio', 'Grupo', ' ');
INSERT INTO `account` VALUES ('263', '3.1.3.1.01', 'Ajuste Global al Patrimonio', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('264', '3.1.3.1.01.001', 'Ajuste Global al Patrimonio', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('265', '3.1.4', 'Utilidades para socios', 'General', ' ');
INSERT INTO `account` VALUES ('266', '3.1.4.1', 'Utilidades para socios', 'Grupo', ' ');
INSERT INTO `account` VALUES ('267', '3.1.4.1.01', 'Utilidades para socios', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('268', '3.1.4.1.01.001', 'Utilidades para socios', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('269', '3.1.5', 'Perdidas Acumuladas', 'General', ' ');
INSERT INTO `account` VALUES ('270', '3.1.5.1', 'Perdidas Acumuladas', 'Grupo', ' ');
INSERT INTO `account` VALUES ('271', '3.1.5.1.01', 'Perdidas Acumuladas', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('272', '3.1.5.1.01.001', 'Perdidas Acumuladas', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('273', '2.1.1.5.01.002', 'Rc - Iva Dependientes por Pagar', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('274', '2.1.1.5.01.004', 'IUE Independientes por Pagar', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('275', '2.1.1.5.01.003', 'Rc - Iva Independientes por Pagar', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('276', '2.1.1.6', 'Iva-Debito Fiscal', 'Grupo', ' ');
INSERT INTO `account` VALUES ('277', '2.1.1.6.01', 'Iva-Debito Fiscal', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('278', '2.1.1.6.01.001', 'Iva-Debito Fiscal', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('279', '1.1.3.3.01', 'Materias primas producidas', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('280', '1.1.3.3.01.001', 'Miel a granel de apis mellifera', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('281', '1.1.3.3.01.002', 'Propoleo solido en bruto', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('282', '1.1.3.3.01.003', 'Extracto Alcoholico de Propoleo (Tintura)', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('283', '1.1.3.3.01.004', 'Jebora (Polen)', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('284', '1.1.3.3.01.005', 'Miel a granel de Apis Melliponica', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('285', '3.1.1.1.01.002', 'Capital Socio Eliana Tellez', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('286', '1.1.2.2', 'Consignaciones', 'Grupo', ' Cuenta para registrar las consignaciones');
INSERT INTO `account` VALUES ('287', '1.1.2.2.01', 'Consignaciones General', 'Subgrupo', 'CONSIGNACIONES GENERAL');
INSERT INTO `account` VALUES ('288', '1.1.2.2.01.002', 'Consignaciones Lorena', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('289', '1.1.2.2.01.003', 'Consignaciones Mariney', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('290', '1.1.3.1.03.002', 'Preparado para spray de propoleo en miel (mellifera)', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('291', '1.1.3.1.03.003', 'Preparado para spray de propoleo en miel (melipona)', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('292', '1.1.3.1.03.004', 'Preparado para miel con polen y propoleo(apienergetico)', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('293', '1.1.3.1.01.009', 'Miel 450gr.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('294', '1.1.3.1.03.005', 'Infusion de Vira-Vira', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('295', '1.1.2.2.01.004', 'Consignaciones Tia Gaby', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('296', '2.1.1.1.01.004', 'Cuentas por pagar a Jorge', 'Apropiacion', ' Cuentas por pagar a papi');
INSERT INTO `account` VALUES ('297', '1.1.2.2.01.005', 'Consignaciones Leo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('298', '1.1.3.1.01.010', 'Miel 800gr.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('299', '1.1.3.1.01.011', 'Miel con propoleo de 450 gr.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('300', '1.1.3.1.03.006', 'Preparado para miel con propoleo', 'Apropiacion', '');
INSERT INTO `account` VALUES ('301', '1.1.3.2.01.005', 'Frasco de vidrio de 800 gr.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('302', '2.1.1.3.01.002', 'Pago jornalero 1', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('303', '2.1.1.3.01.003', 'Pago jornalero 2', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('304', '1.1.2.2.01.006', 'Consignaciones Mauricio Rossell Descarpontries', 'Apropiacion', 'Dentista de mami\r\nC/Cecilio Guzm?n');
INSERT INTO `account` VALUES ('305', '1.1.2.2.01.007', 'Consignaciones Fabiola Paz Saucedo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('306', '1.1.3.1.01.012', 'Miel 250gr.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('307', '7.1.4.2.02.030', 'Gastos auto', 'Apropiacion', ' Gastos de arreglos mec?nicos, etc.');
INSERT INTO `account` VALUES ('308', '4.1.1.1.01.002', 'Venta de Productos Leonardo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('309', '1.1.3.2.01.006', 'Frasco PET ámbar 30ml', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('310', '1.1.3.1.01.014', 'Spray de miel de apis mellifera 30ml', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('311', '1.1.3.2.01.007', 'Envase de plastico cuadrado', 'Apropiacion', 'Envase de plastico cuadrado con tapa (para panales naturales)');
INSERT INTO `account` VALUES ('312', '1.1.3.1.01.015', 'Cajita plastica de miel con panal 600gr', 'Apropiacion', ' Cajita plastica de miel con panal 600gr');
INSERT INTO `account` VALUES ('313', '1.1.3.1.01.016', 'Miel de 1000gr.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('314', '1.1.3.2.01.008', 'Frasco de vidrio de 1000gr', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('315', '7.1.1.1.01.031', 'Gastos varios', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('316', '1.1.2.2.01.008', 'Consignaciones Guingui', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('317', '7.1.2.1.03.032', 'Costos de Comercialización', 'Apropiacion', 'Costos derivados del esfuerzo de ventas ');
INSERT INTO `account` VALUES ('318', '2.1.1.1.01.005', 'Cuentas por pagar', 'Apropiacion', ' Cuentas por pagar en general');
INSERT INTO `account` VALUES ('319', '1.1.2.1.01.004', 'Cuentas por Cobrar Otros', 'Apropiacion', ' Otros');
INSERT INTO `account` VALUES ('320', '1.1.2.1.01.005', 'Anticipo a Proveedores', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('321', '1.1.3.2', 'Inventario de Materiales', 'Grupo', ' Frascos, envases, goteros, sprays, etiquetas, etc.');
INSERT INTO `account` VALUES ('322', '1.1.3.3', 'Inventario de Materias Primas', 'Grupo', 'Miel, prop?leo, vira-vira, alcohol. ');
INSERT INTO `account` VALUES ('325', '1.1.3.2.01', 'Materiales', 'Subgrupo', ' Frascos, goteros, sprays, etiquetas, etc.');
INSERT INTO `account` VALUES ('326', '1.1.3.2.02', 'Inventario de Materiales en transito', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('327', '1.1.3.2.02.001', 'Materiales en transito', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('328', '2.1.1.1.01.006', 'Cuentas por pagar a proveed. Brasil', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('329', '2.1.1.1.01.007', 'Cuentas por pagar a prooved. La Ramada', 'Apropiacion', ' Proveedora de frascos de 212ml de La Ramada.');
INSERT INTO `account` VALUES ('330', '1.1.3.2.01.009', 'Etiquetas', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('332', '1.1.3.1.04', 'Stock Eliana', 'Subgrupo', 'Invent?rio de productos terminados en el stock de Eli ');
INSERT INTO `account` VALUES ('333', '1.1.3.1.05', 'Stock Leonardo', 'Subgrupo', 'Invent?rio de productos terminados en el stock de Leo');
INSERT INTO `account` VALUES ('334', '1.1.3.1.04.001', 'S.E. Spray de Apis Mellifera 30ml', 'Apropiacion', ' Spray de Apis Mellifera 30ml en el stock de Eli');
INSERT INTO `account` VALUES ('335', '1.1.3.1.05.001', 'S.L. Spray de Apis Mellifera 30ml', 'Apropiacion', ' S.E. Spray de Apis Mellifera 30ml en el stock de Leo');
INSERT INTO `account` VALUES ('336', '1.1.3.1.04.002', 'S.E. Gotero de Propoleo 20 ml.', 'Apropiacion', 'Propoleo Gotero 20 ml que queda en el stock de Eli');
INSERT INTO `account` VALUES ('337', '1.1.3.1.05.002', 'S.L. Gotero de Propoleo 20 ml.', 'Apropiacion', 'Propoleo Gotero 20 ml. que queda en el stock de Leo');
INSERT INTO `account` VALUES ('338', '1.1.3.1.04.003', 'S.E. Frasco de Miel con polen y prop?leo(apienergetico) 250gr.', 'Apropiacion', 'Frasco de Miel con polen y prop?leo(apienergetico) 250gr que queda en el stock de Eli');
INSERT INTO `account` VALUES ('339', '1.1.3.1.05.003', 'S.L. Frasco de Miel con polen y propoleo(Apienergetico) 250gr.', 'Apropiacion', 'Frasco de Miel con polen y propoleo(Apienergetico) 250gr. que queda en el stock de Leo');
INSERT INTO `account` VALUES ('340', '1.1.2.2.01.009', 'Consignaciones Jessica', 'Apropiacion', ' Consignaciones Jessica Salazar');
INSERT INTO `account` VALUES ('341', '1.1.2.2.01.010', 'Consignaciones Tienda Gaya', 'Apropiacion', 'Consignaciones Tienda Gaia ');
INSERT INTO `account` VALUES ('342', '1.1.2.2.01.011', 'Consignaciones Jorge Tellez', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('343', '1.1.2.2.01.012', 'Consignaciones Farmacia Zeballos', 'Apropiacion', 'Farmacia Zeballos 3er anillo al lado del Zoo. ');
INSERT INTO `account` VALUES ('344', '1.1.2.2.01.013', 'Consignaciones Farmacia Franco', 'Apropiacion', 'Farmacia Franco, frente al Oncol?gico ');
INSERT INTO `account` VALUES ('345', '7.1.2.1.03.033', 'Promocion y Marketing', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('346', '4.1.1.1.01.004', 'Tasa de envio', 'Apropiacion', 'Cobro por el env?o de productos ');
INSERT INTO `account` VALUES ('347', '1.1.2.2.01.014', 'Consignaciones Fruvel', 'Apropiacion', ' Fruvel Eco Shop');
INSERT INTO `account` VALUES ('348', '1.1.2.2.01.015', 'Consignaciones Bismark Cuellar', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('349', '1.1.2.2.01.016', 'Consignaciones Tienda Rasha', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('350', '1.2.1.4.01.002', 'Muebles y enseres', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('351', '1.1.2.2.01.017', 'Consignaciones Naturalia-Beni', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('352', '1.1.2.2.01.018', 'Consignaciones Abihail', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('353', '1.1.3.2.01.010', 'Frasco de vidrio de 28ml', 'Apropiacion', ' Para pomada de prop?leo');
INSERT INTO `account` VALUES ('354', '1.1.3.3.02.001', 'Lanolina', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('355', '1.1.3.3.02.002', 'Vaselina', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('356', '1.1.3.1.03.007', 'Extracto blando de propoleo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('357', '1.1.3.1.03.008', 'Preparado para crema de propoleo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('358', '1.1.2.2.01.019', 'Consignaciones Cafe Rogelia', 'Apropiacion', 'Caf? Rog?lia (Buenavista) ');
INSERT INTO `account` VALUES ('359', '1.1.2.2.01.020', 'Consignaciones Feria', 'Apropiacion', ' Para lo que se saca para una feria.');
INSERT INTO `account` VALUES ('360', '1.1.2.2.01.021', 'Consignaciones Super Macarena', 'Apropiacion', ' Av. Ib?rica frente a la iglesia La Macarena, barrio Las Palmas');
INSERT INTO `account` VALUES ('361', '1.2.1.4.01.003', 'Materiales Apicolas', 'Apropiacion', ' Cajas, marcos, tapas, pisos, etc.');
INSERT INTO `account` VALUES ('362', '1.2.1.4.01.004', 'Herramientas', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('363', '1.1.2.2.01.022', 'Consignaciones Boulangerie  Las Palmas', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('364', '2.1.1.5.01.005', 'Impuesto Regimen Simplificado', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('365', '3.1.1.1.01.003', 'Fondo de Reserva', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('366', '7.1.4.1.04.034', 'Otros costos de produccion', 'Apropiacion', 'Gorros, Guantes, Barbijos, Alcohol,Toallas absorventes');
INSERT INTO `account` VALUES ('367', '7.1.1.1.01.035', 'Perdidas', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('368', '7.1.4.1.04.036', 'Servicios Basicos (no se está usando)', 'Apropiacion', ' (no se está usando)');
INSERT INTO `account` VALUES ('369', '1.1.2.2.01.023', 'Consignaciones Oz Food', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('370', '7.1.4.2.02.037', 'Costos de produccion de materias primas', 'Apropiacion', ' Costos para producir las materias primas, miel, jebor?, tintura de prop?leo.');
INSERT INTO `account` VALUES ('371', '1.1.2.1.05.006', 'Costos por cobrar', 'Apropiacion', 'Esta cuenta se usa para compensar la cuenta por cobrar a clientes, pues los costos verdaderos se compensas a la hora de realizado el pago.');
INSERT INTO `account` VALUES ('372', '7.1.4.2.02', 'Costos de produccion de materias primas', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('373', '7.1.2.1.03', 'Costos de comercialización', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('374', '7.1.4.1.04', 'Costos de produccion de productos', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('375', '7.1.4.2.02.023', 'Material de aseo centro de acopio', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('376', '7.1.2.1.03.034', 'Pago de ferias', 'Apropiacion', ' Por concepto de pago de stand en las ferias.');
INSERT INTO `account` VALUES ('377', '1.1.2.2.01.024', ' Consignaciones Boulangerie 3er anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('378', '1.1.2.2.01.025', 'Consignaciones Boulangerie Urubo Mall', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('379', '1.1.2.2.01.026', 'Consignaciones Samantha', 'Apropiacion', ' Consignaciones Samatha');
INSERT INTO `account` VALUES ('380', '1.1.2.2.01.027', 'Consignaciones Naturalia-Sirari', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('381', '1.1.3.1.01.017', 'Miel 28ml', 'Apropiacion', ' Frasquito de 28ml de miel pura para mascarilla facial');
INSERT INTO `account` VALUES ('382', '1.1.2.2.01.028', 'Consignaciones Granel', 'Apropiacion', 'Tienda Granel ');
INSERT INTO `account` VALUES ('383', '1.1.2.2.01.029', 'Consignaciones Mariana', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('384', '1.1.3.3.02', 'Materias primas adquiridas', 'Subgrupo', 'Materias primas que comprarmos y que no producimos nosotros');
INSERT INTO `account` VALUES ('385', '1.1.3.1.06', 'Inventario de productos descartados', 'Subgrupo', 'Productos devueltos por vencimiento');
INSERT INTO `account` VALUES ('386', '1.1.3.1.06.001', 'Descarte Spray de 30ml (apis mellifera)', 'Apropiacion', ' Sprays para descarte');
INSERT INTO `account` VALUES ('387', '1.1.3.1.06.002', 'Descarte Gotero de Propoleo 20 ml.', 'Apropiacion', 'Goteros para descarte');
INSERT INTO `account` VALUES ('388', '1.1.3.1.06.003', 'Descarte Apienergetico', 'Apropiacion', 'Apienergeticos para descarte');
INSERT INTO `account` VALUES ('389', '1.1.3.1.06.004', 'Descarte Propomiel', 'Apropiacion', 'Propomiel para descarte');
INSERT INTO `account` VALUES ('390', '1.1.2.2.01.030', 'Consingaciones Peluqueria Andrea', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('391', '7.1.2.1.03.035', 'Costos de envio de productos terminados', 'Apropiacion', ' Fletes, encomiendas, costos de env?o de productos terminados a clientes.');
INSERT INTO `account` VALUES ('393', '1.1.2.2.01.031', 'Consingacnioes Ruddy Rodriguez', 'Apropiacion', ' Contador');
INSERT INTO `account` VALUES ('394', '1.1.2.2.01.032', 'Consignaciones La Huerta', 'Apropiacion', ' Supermercado La Huerta');
INSERT INTO `account` VALUES ('395', '1.1.2.2.01.033', 'Consignaciones La Peta', 'Apropiacion', 'La Peta Restaurante Gourmet ');
INSERT INTO `account` VALUES ('396', '1.1.2.2.01.034', 'Consignaciones Tienda Epoca', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('397', '1.1.2.2.01.035', 'Consignaciones Green Lovers - Equipetrol', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('398', '1.1.2.2.01.036', 'Consignaciones Organic', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('399', '1.1.2.2.01.037', 'Consignaciones C-Come', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('400', '1.1.2.2.03.038', 'Consignaciones Pronto Terrazas 2', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('401', '1.1.2.2.03.039', 'Consignaciones Pronto Pinatar', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('402', '1.1.2.2.03.040', 'Consignaciones Pronto El Bosque', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('403', '1.1.2.2.03.041', 'Consingaciones Pronto Jardines', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('405', '1.1.2.2.01.042', 'Consignaciones Mini Market El Trompillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('406', '1.1.2.2.01.043', 'Consignaciones Super Sr. Mini', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('407', '1.1.2.2.01.044', 'Consignaciones Mini Market Plus', 'Apropiacion', 'En la Av. Escuadron Velasco ');
INSERT INTO `account` VALUES ('408', '1.1.2.2.04.045', 'Consignaciones FreRox Fontana', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('409', '1.1.2.2.04.046', 'Consignaciones FreRox Jardines', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('410', '1.1.2.2.04.047', 'Consignaciones FreRox Versalles', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('411', '1.1.2.2.01.048', 'Consignaciones Supercito II', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('412', '1.1.2.2.01.049', 'Consingaciones Supercito I', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('413', '1.1.1.1.03.004', 'Caja de ahorro Envases', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('414', '1.1.2.2.01.050', 'Consignaciones Mini Market Nova', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('415', '1.1.2.2.01.051', 'Consignaciones Wonderfull', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('416', '1.1.2.2.01.052', 'Consignaciones Green Lovers - Centro', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('417', '1.1.2.2.01.053', 'Consignaciones Green Lovers - Av. Pirai', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('418', '1.2.1.4.01.005', 'Material de Promocion y Marketing', 'Apropiacion', ' Mostradorcitos, estantes, carretes, etc.');
INSERT INTO `account` VALUES ('419', '1.1.1.1.03.005', 'Caja de ahorro Costos de comercializacion', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('420', '1.1.2.2.03.054', ' Consignaciones Pronto Av. Banzer', 'Apropiacion', 'Supermercado Pronto en Av. Banzer 8vo anillo.');
INSERT INTO `account` VALUES ('421', '1.1.3.3.02.003', 'Aceite de Coco', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('422', '1.1.3.3.02.004', 'Cera de Abejas', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('423', '1.1.3.1.01.018', 'Crema de Coco', 'Apropiacion', 'Crema a base de cera, aceite de coco y propoleo');
INSERT INTO `account` VALUES ('424', '1.1.3.1.03.009', 'Preparado para crema de coco', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('425', '7.1.4.2.06.037', 'Costo de materias primas (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('427', '7.1.4.1.05.039', 'Costo Etiqueta (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('428', '7.1.4.1.04.040', 'Costo mano de obra', 'Apropiacion', ' Agua, electricidad, gas ');
INSERT INTO `account` VALUES ('429', '7.1.4.1.04.041', 'Costo Servicios Basicos', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('430', '7.1.4.1.04.042', 'Costos de produccion de productos', 'Apropiacion', ' Cuenta de apropiaci?n de Costos de producci?n de productos');
INSERT INTO `account` VALUES ('431', '1.1.2.2.01.055', 'Consingaciones Cinthia Villarroel', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('432', '1.1.1.1.03.006', 'Caja General 28jun2019', 'Apropiacion', 'Para hacer borron y cuenta nueva 27-jun-2019 ');
INSERT INTO `account` VALUES ('433', '1.1.1.1.03.007', 'Caja de ahorro Reserva', 'Apropiacion', ' Caja para gastos varios');
INSERT INTO `account` VALUES ('434', '1.1.1.1.03.008', 'Caja de ahorro Costos Produccion', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('435', '1.1.1.1.03.009', 'Caja de ahorro para impuestos', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('436', '7.1.4.2.06.043', 'Costo Tintura de propoleo (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('437', '7.1.4.2.06.044', 'Costo Jebora(Polen) (no se está usando)', 'Apropiacion', ' (no se está usando)');
INSERT INTO `account` VALUES ('438', '7.1.4.2.06.045', 'Costo Infusion Vira-Vira (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('439', '7.1.4.1.05.046', 'Costo Envase Spray 30 ml (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('440', '7.1.4.2.06.047', 'Costo Miel de Apis Mellifera (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('441', '7.1.4.2.06.048', 'Costo Lanolina (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('442', '7.1.4.2.06.049', 'Costo Vaselina (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('443', '7.1.4.1.05.050', 'Costo Envase de Gotero (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('444', '7.1.4.1.05.051', 'Costo Frasco de Vidrio 212 ml (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('445', '7.1.4.1.05.052', 'Costo Frasco de vidrio 28ml (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('446', '7.1.4.2.06.053', 'Costo Aceite de Coco (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('447', '7.1.4.2.06.054', 'Costo Cera de Abejas (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('448', '7.1.1.1.01.036', 'Mantenimiento BMSC Cta. 4066983739', 'Apropiacion', ' Cuenta de Eli');
INSERT INTO `account` VALUES ('449', '7.1.4.1.05', 'Costo Envases (no se está usando)', 'Subgrupo', '  (no se está usando)');
INSERT INTO `account` VALUES ('450', '7.1.2', 'Costos de Comecialización', 'General', ' ');
INSERT INTO `account` VALUES ('452', '7.1.4', 'Costos de produccion de productos', 'General', ' ');
INSERT INTO `account` VALUES ('453', '7.1.4.2', 'Costo de Materias Primas', 'Grupo', ' ');
INSERT INTO `account` VALUES ('454', '7.1.4.1', 'Costo de produccion de productos', 'Grupo', ' ');
INSERT INTO `account` VALUES ('455', '7.1.2.1', 'Costos de Comecialización', 'Grupo', ' ');
INSERT INTO `account` VALUES ('456', '7.1.4.2.06', 'Costo de Materias Primas (no se está usando)', 'Subgrupo', '  (no se está usando)');
INSERT INTO `account` VALUES ('457', '1.1.2.1.01.007', 'Ctas. x cobrar a Farmacia Zeballos', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('458', '1.1.2.1.01.008', 'Ctas. x cobrar a Cafe Rogelia', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('459', '1.1.2.1.01.009', 'Ctas. x cobrar a Super Macarena', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('460', '1.1.2.1.01.010', 'Ctas. x cobrar a Naturalia-Sirari', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('461', '1.1.2.1.01.011', 'Ctas. x cobrar a Granel', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('462', '1.1.2.1.01.012', 'Ctas. x cobrar a La Huerta', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('463', '1.1.2.1.01.013', 'Ctas. x cobrar a La Peta', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('464', '1.1.2.1.01.014', 'Ctas. x cobrar a Tienda Epoca', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('465', '1.1.2.1.01.015', 'Ctas. x cobrar a Green Lover- Equipe', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('466', '1.1.2.1.01.016', 'Ctas. x cobrar a Organic', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('467', '1.1.2.1.03.017', 'Ctas. x cobrar a Pronto Terrazas II', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('468', '1.1.2.1.03.018', 'Ctas. x cobrar a Pronto Pinatar', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('469', '1.1.2.1.03.019', 'Ctas. por cobrar a Pronto El Bosque', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('470', '1.1.2.1.03.020', 'Ctas. x cobrar a Pronto Jardines', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('471', '1.1.2.1.01.021', 'Ctas. x cobrar a El Trompillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('472', '1.1.2.1.01.022', 'Ctas. x cobrar a Sr.  Mini', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('473', '1.1.2.1.01.023', 'Ctas. x cobrar a Market Plus', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('474', '1.1.2.1.04.024', 'Ctas. x cobrar a FreRox Fontana', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('475', '1.1.2.1.04.025', 'Ctas. por cobrar a FreRox Versalles', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('476', '1.1.2.1.01.026', 'Ctas. por cobrar a Supercito II', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('477', '1.1.2.1.01.027', 'Ctas. x cobrar a Supercito I', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('478', '1.1.2.1.01.028', 'Ctas. por cobrar a Supercito I', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('479', '1.1.2.1.01.029', 'Ctas. por cobrar a Market Nova', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('480', '1.1.2.1.01.030', 'Ctas. x cobrar a Wonderful Remanso', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('481', '1.1.2.1.01.031', 'Ctas. x cobrar a Green Lovers-Centro', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('482', '1.1.2.1.01.032', 'Ctas. x cobrar a Green Lovers-Av. Pirai', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('483', '1.1.2.1.03.033', 'Ctas. x cobrar a Pronto Av. Banzer', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('484', '1.1.2.1.01.034', 'Ctas. por cobrar a Cinthia Villarroel', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('485', '1.1.2.1.01.035', 'Ctas. por cobrar a Ferias', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('486', '1.1.2.1.01.036', 'Ctas. x cobrar a Faby', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('487', '1.1.2.1.01.037', 'Ctas. x cobrar a Mariney', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('488', '1.1.2.1.02', 'Cuentas por Cobrar a Farmacorp', 'Subgrupo', ' CUENTAS POR COBRAR A FARMACORP');
INSERT INTO `account` VALUES ('489', '1.1.2.1.02.001', 'Ctas. X Cobrar B102-Sc02 Pirai Esq.2do Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('490', '1.1.2.2.02', 'Consignaciones Farmacorp', 'Subgrupo', ' CONSIGNACIONES FARMACORP');
INSERT INTO `account` VALUES ('491', '1.1.2.2.02.001', 'Consignaciones B102-Sc02 Pirai Esq.2doanillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('492', '1.1.2.2.02.002', 'Consignaciones B104-Sc03 Irala-Esq. Mons. Santiesteban', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('493', '1.1.2.1.02.002', 'Ctas. X Cobrar B104-Sc03 Irala-Esq. Mons. Santiesteban', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('494', '1.1.2.2.02.003', 'Consignaciones B108-Sc07 Irala #564', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('495', '1.1.2.1.02.003', 'Ctas. X Cobrar B108-Sc07 Irala #564', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('496', '1.1.2.1.02.004', 'Ctas. X Cobrar B111-Sc10 Trinidad Esq.2doanillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('497', '1.1.2.2.02.004', 'Consignaciones B111-Sc10 Trinidad Esq.2doanillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('498', '1.1.2.1.02.005', 'Ctas. X Cobrar B112-Sc05 Canoto-Esq Mexico', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('499', '1.1.2.2.02.005', 'Consignaciones B112-Sc05 Canoto Esq Mexico', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('500', '1.1.2.1.02.006', 'Ctas. X Cobrar B114-Sc18 Banzer Torres Gemelas', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('501', '1.1.2.2.02.006', 'Consignaciones B114-Sc18 Banzer Torres Gemelas', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('502', '1.1.2.1.02.007', 'Ctas. X Cobrar B115-Sc19 Grigota Esq. Barrientos', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('503', '1.1.2.1.02.008', 'Ctas. X Cobrar B116-Sc20 Virgen De Cotoca Esq 2do Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('504', '1.1.2.1.02.009', 'Ctas. X Cobrar B117-Sc22 Banzer Esq. 7mo Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('505', '1.1.2.1.02.010', 'Ctas. X Cobrar B118-Sc25 Sn. Martin #335-Equipetrol', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('506', '1.1.2.1.02.011', 'Ctas. X Cobrar B122-Sc26 St. Doumont Esq 3er Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('507', '1.1.2.1.02.012', 'Ctas. X Cobrar B123-Sc30 A.Manso Esq.M.Santiestevan', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('508', '1.1.2.1.02.013', 'Ctas. X Cobrar B124-Sc31 Av. Paragua Esq. 4to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('509', '1.1.2.1.02.014', 'Ctas. x cobrar B125-SC32 Av. Viedma Esq. Ballivian', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('510', '1.1.2.1.02.015', 'Ctas. x cobrar B126-SC33 St. Doumont Esq. 5to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('511', '1.1.2.1.02.016', 'Ctas. x cobrar B128-SC34 R.Aguilera Esq. Mataral (Chirig.)', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('512', '1.1.2.1.02.017', 'Ctas. x cobrar B129-SC35 Las Palmas Esq. Av. Iberica', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('513', '1.1.2.1.02.018', 'Ctas. x cobrar B130-SC36 Ca?oto Esq. Libertad', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('514', '1.1.2.1.02.019', 'Ctas. x cobrar B131-SC40 Busch Esq.3er Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('515', '1.1.2.1.02.020', 'Ctas. x cobrar B132-SC38 Tomas de Lezo Esq.2do Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('516', '1.1.2.1.02.021', 'Ctas. x cobrar B133-SC39 V.Cotoca Esq.Av.Union 5to Ani', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('517', '1.1.2.1.02.022', 'Ctas. x cobrar B135-SC45 Av.Japon Esq. Paragua(3er Ani)', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('518', '1.1.2.1.02.023', 'Ctas. x cobrar B137-SC47 Alemana Esq.4to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('519', '1.1.2.1.02.024', 'Ctas. x cobrar B138 Beni Esq.4to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('520', '1.1.2.1.02.025', 'Ctas. x cobrar B139-SC49 Av.Banzer Esq.6to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('521', '1.1.2.1.02.026', 'Ctas. x cobrar B142-SC53 Banzer Esq. 4to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('522', '1.1.2.1.02.027', 'Ctas. x cobrar B144-SC55 Irala Argentina', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('523', '1.1.2.1.02.028', 'Ctas. x cobrar B147-SC65 Grigota entre 5to y 6to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('524', '1.1.2.1.02.029', 'Ctas. x cobrar B148-SC67 Biopetrol Equipetrol', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('525', '1.1.2.1.02.030', 'Ctas. x cobrar B149-SC66 Urubo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('526', '1.1.2.1.02.031', 'Ctas. x cobrar B151-SC70 Biopetrol Roca y Coronado', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('527', '1.1.2.1.02.032', 'Ctas. x cobrar B153-SC73 Mall Ventura', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('528', '1.1.2.1.02.033', 'Ctas. x cobrar B155-SC88 Av.Pirai Nro.400 B/Santa Monica', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('529', '1.1.2.1.02.034', 'Ctas. x cobrar B159-SC90 Av.La Barranca Nro.32 Barrio Aeronautico', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('530', '1.1.2.1.02.035', 'Ctas. x cobrar B162-SC97 Av.2 de Agosto B/Los Tusequis', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('531', '1.1.2.1.02.036', 'Ctas. x cobrar B163-SC100 Av.Uruguay Esq.Mamore', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('532', '1.1.2.1.02.037', 'Ctas. x cobrar B164-SC Heroes del Chaco UV91 MZ18', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('533', '1.1.2.1.02.038', 'Ctas. x cobrar B170-SC Av.Paragua 2do.Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('534', '1.1.2.1.02.039', 'Ctas. x cobrar B172 Mutualista y 3er. Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('535', '1.1.2.1.02.040', 'Ctas. x cobrar B173-SC Radial 13 4to.Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('536', '1.1.2.1.02.041', 'Ctas. x cobrar B174-SC Av.Ovidio Barbery - 3er Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('537', '1.1.2.1.02.042', 'Ctas. x cobrar B175-SC Radial 17 y 1/2 5to anillo UB.120 MZ.10 L11', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('538', '1.1.2.2.02.007', 'Consignaciones B115-SC19 Grigota Esq.Barrientos', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('539', '1.1.2.2.02.008', 'Consignaciones B116-SC20 Virgen de Cotoca Esq.2do Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('540', '1.1.2.2.02.009', 'Consignaciones B117-SC22 Banzer Esq.7mo Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('541', '1.1.2.2.02.010', 'Consignaciones B118-SC25 Sn.Martin #335-Equipetrol', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('542', '1.1.2.2.02.011', 'Consignaciones B122-SC26 St.Doumont Esq. 3er Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('543', '1.1.2.2.02.012', 'Consignaciones B123-SC30 A.Manso Esq.M.Santiestevan', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('544', '1.1.2.2.02.013', 'Consignaciones B124-SC31 Av.Paragua Esq. 4to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('545', '1.1.2.2.02.014', 'Consignaciones B125-SC32 Av.Viedma Esq. Ballivian', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('546', '1.1.2.2.02.015', 'Consignaciones B126-SC33 St.Doumont Esq.5to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('547', '1.1.2.2.02.016', 'Consignaciones B128-SC34 R.Aguilera Esq.Mataral(Chirig)', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('548', '1.1.2.2.02.017', 'Consignaciones B129-SC35 Las Palmas Esq.Av.Iberica', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('549', '1.1.2.2.02.018', 'Consignaciones B130-SC36 Canoto Esq.Libertad', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('550', '1.1.2.2.02.019', 'Consignaciones B131-SC40 Busch Esq.3er Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('551', '1.1.2.2.02.020', 'Consignaciones B132-SC38 Tomas de Lezo Esq. 2do anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('552', '1.1.2.2.02.021', 'Consignaciones B133-SC39 V.Cotoca Esq.Av.Union 5to ani', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('553', '1.1.2.2.02.022', 'Consignaciones B135-SC45 Av.Japon Esq.Paragua 3er ani', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('554', '1.1.2.2.02.023', 'Consignaciones B137-SC47 Alemana Esq.4to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('555', '1.1.2.2.02.024', 'Consignaciones B138-SC48 Beni Esq. 4to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('556', '1.1.2.2.02.025', 'Consignaciones B139-SC49 Av.Banzer Esq.6to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('557', '1.1.2.2.02.026', 'Consignaciones B142-SC53 Banzer Esq.4to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('558', '1.1.2.2.02.027', 'Consignaciones B144-SC55 Irala Argentina', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('559', '1.1.2.2.02.028', 'Consignaciones B147-SC65 Grigota entre 5to y 6to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('560', '1.1.2.2.02.029', 'Consignaciones B148-SC67 Biopetrol Equipetrol', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('561', '1.1.2.2.02.030', 'Consignaciones B149-SC66 Urubo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('562', '1.1.2.2.02.031', 'Consignaciones B151-SC70 Biopetrol Roca y Coronado', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('563', '1.1.2.2.02.032', 'Consignaciones B153-SC73 Mall Ventura', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('564', '1.1.2.2.02.033', 'Consignaciones B155-SC88 Av.Pirai Nro.400 B/Santa Monica', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('565', '1.1.2.2.02.034', 'Consignaciones B159-SC90 Av.La Barranca nro.32 Barrio Aeronautico', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('566', '1.1.2.2.02.035', 'Consignaciones B162-SC97 Av.2 de agosto B/Los Tusequis', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('567', '1.1.2.2.02.036', 'Consignaciones B163-SC100 Av.Uruguay esq.Mamore', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('568', '1.1.2.2.02.037', 'Consignaciones B164-SC Heroes del Chaco UV91 MZ18', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('569', '1.1.2.2.02.038', 'Consignaciones B170-SC Av.Paragua 2do.Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('570', '1.1.2.2.02.039', 'Consignaciones B172 Mutualista y 3er. Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('571', '1.1.2.2.02.040', 'Consignaciones B173-SC Radial 13-4to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('572', '1.1.2.2.02.041', 'Consignaciones B174-SC Av.Ovidio Barbery 3er Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('573', '1.1.2.2.02.042', 'Consignaciones B175-SC Radial 17 y 1/2 5to anillo UB.120 MZ.10 L11', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('574', '1.2.1.4.01.006', 'Material de Escritorio', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('575', '1.1.2.2.01.056', 'Consignaciones ECOMANOS', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('576', '1.1.2.1.01.043', 'Ctas. x cobrar a ECOMANOS', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('577', '1.1.2.2.04.044', 'Consignaciones FreRox Sevilla Terrazas I', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('578', '1.1.2.1.04.044', 'Ctas. x cobrar a FreRox Sevilla Terrazas I', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('579', '1.1.1.1.03.010', 'Caja de ahorro Mano de Obra', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('580', '1.1.1.1.03', 'Caja de Ahorro BMSC 4066983739-28jun2019', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('581', '1.1.1.1.03.011', 'Caja de ahorro Costos Prod. Mat. Primas', 'Apropiacion', ' Ahorro para costos de producci?n de materias primas');
INSERT INTO `account` VALUES ('582', '1.1.1.1.03.012', 'Caja de ahorro Utilidades', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('583', '1.1.3.3.02.005', 'Alcohol', 'Apropiacion', 'Para producir tintura de prop?leo');
INSERT INTO `account` VALUES ('584', '3.1.1.1.01.004', 'Capital Socio Mauricio Cochamanidis', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('585', '1.1.2.4.01.003', 'Prest./Anticipo a Mauricio Cochamanidis', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('586', '1.1.2.2.04.048', 'Consignaciones FreRox 7mo Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('587', '1.1.2.1.04.045', 'Ctas. x cobrar FreRox 7mo Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('588', '1.1.2.2.03', 'Consignaciones Pronto', 'Apropiacion', ' CONSIGNACIONES PRONTO');
INSERT INTO `account` VALUES ('589', '1.1.2.2.04', 'Consignaciones FreRox', 'Apropiacion', ' CONSIGNACIONES FREROX');
INSERT INTO `account` VALUES ('590', '1.1.2.1.03', 'Cuentas Por Cobrar a Pronto', 'Apropiacion', ' CUENTAS POR COBRAR A PRONTO');
INSERT INTO `account` VALUES ('591', '1.1.2.1.04', 'Cuentas por cobrar a FreRox', 'Apropiacion', 'CUENTAS POR COBRAR A FREROX');
INSERT INTO `account` VALUES ('592', '3.1.6', 'Ganancias por venta de productos', 'General', ' ');
INSERT INTO `account` VALUES ('593', '3.1.6.1', 'Ganancias por venta de productos', 'Grupo', ' ');
INSERT INTO `account` VALUES ('594', '3.1.6.1.01', 'Ganancias por venta de productos', 'Subgrupo', ' ');
INSERT INTO `account` VALUES ('595', '3.1.6.1.01.001', 'Ganancias por venta de productos', 'Apropiacion', 'Representa lo que se compensará con los costos de produccion del producto sin contar con las utilidades para socios');
INSERT INTO `account` VALUES ('596', '1.1.3.2.01.011', 'Prescintos Retrocontraibles', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('597', '1.1.3.2.01.012', 'Etiqueta para crema vaselina', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('598', '1.2.1.4.01.007', 'Implementos de produccion', 'Apropiacion', ' Jarras, ollas, probetas, morteros, etc.');
INSERT INTO `account` VALUES ('600', '1.1.1.1.02.004', 'Caja Chica Mauricio', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('601', '1.1.3.1.01.019', 'Jabon de Miel', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('602', '1.1.3.3.02.006', 'Glicerina', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('603', '1.1.3.3.02.007', 'Curcuma', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('604', '1.1.3.1.03.010', 'Preparado para jabon de miel', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('605', '7.1.4.2.06.055', 'Costo Glicerina (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('606', '7.1.4.2.06.056', 'Costo Curcuma (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('607', '1.1.2.2.02.043', 'Consignaciones B156-Sc78 Jose Ramon Esq. 3 Pasos Al Frente', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('608', '1.1.2.1.02.043', 'Ctas. x cobrar B156-SC78 Jose Ramon Esq. 3 Pasos al Frente', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('609', '1.1.2.2.01.057', 'Consignaciones Nadia', 'Apropiacion', 'Vecina de Eli ');
INSERT INTO `account` VALUES ('610', '1.1.2.1.01.044', 'Ctas. x Cobrar a Nadia', 'Apropiacion', 'Vecina de Eli ');
INSERT INTO `account` VALUES ('611', '1.1.2.1.01.045', 'Ctas. x Cobrar a Carolina Descarpontries', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('612', '1.1.2.2.01.058', 'Consignaciones Carolina Descarpontries', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('613', '1.1.2.1.02.044', 'Ctas. x Cobrar B182 Av. Santos Doumont 4to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('614', '1.1.2.1.02.045', 'Ctas. x Cobrar B193 Av. Beni 6to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('615', '1.1.2.2.02.045', 'Consignaciones B182 Av. Santos Doumont 4to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('616', '1.1.2.2.02.046', 'Consignaciones B193 Av. Beni 6to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('617', '1.1.2.1.02.046', 'Ctas. X Cobrar B136 Av.Paurito Esq. 6toanillo', 'Apropiacion', 'B136 AV.PAURITO Esq. 6toAnillo');
INSERT INTO `account` VALUES ('618', '1.1.2.2.02.044', 'Consignaciones B136 Av.Paurito Esq. 6toanillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('619', '1.1.2.1.02.047', 'Ctas. x cobrar B183 Av.Santos Dumont 6to Y 7mo Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('620', '1.1.2.2.02.047', 'Consignaciones B183 Av.Santos Dumont 6to Y 7mo Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('621', '1.1.2.1.02.048', 'Ctas. x cobrar B184 Av.Paurito Uv 163 El Mechero', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('622', '1.1.2.2.02.048', 'Consignaciones B184 Av.Paurito Uv 163 El Mechero', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('623', '1.1.2.1.02.049', 'Ctas. x Cobrar B109 Sc-09 Argomosa Esq.Charcas', 'Apropiacion', 'B109 - SC-09 ARGOMOSA Esq.CHARCAS    (Av.Argamosa Esq. Charcas)');
INSERT INTO `account` VALUES ('624', '1.1.2.1.02.050', 'Ctas x Cobrar  B134 Sc-41 Doble Via La Guardia Entre 6to.Y7mo', 'Apropiacion', 'B134 - Sc-41 Doble Via Laguardia Entre 6to.Y7mo    (Doble Via Guardia Km.6)');
INSERT INTO `account` VALUES ('625', '1.1.2.1.02.051', 'Ctas. x cobrar B145 - Sc-60 Av.Valle Grande Esq.5to.Ani', 'Apropiacion', ' B145 - SC-60 AV.VALLE GRANDE Esq.5tO.ANI    (Av. Vallegrande esq 5to anillo)');
INSERT INTO `account` VALUES ('630', '1.1.2.1.02.052', 'Ctas. x cobrar B152 - Sc-72 Calle 16 De Julio - Montero', 'Apropiacion', 'B152 - SC-72 CALLE 16 DE JULIO - MONTERO    (C/16 de Julio S/N entre Warnes y 1ro de mayo)');
INSERT INTO `account` VALUES ('631', '1.1.2.1.02.053', 'Ctas. x cobrar B154 - Sc-77 Av. 25 Mayo Warnes', 'Apropiacion', 'B154 - SC-77 AV. 25 MAYO WARNES    (Av. 25 de Mayo Nro 4 Barrio Central)');
INSERT INTO `account` VALUES ('632', '1.1.2.1.02.054', 'Ctas. x cobrar B161 - Sc-95 C/Ofelia Sanchez Nro.777 B/ Valle Sanchez', 'Apropiacion', 'B161 - SC-95 C/OFELIA SANCHEZ Nro.777 B/ VALLE SANCHEZ    (Calle Ofelia S?nchez N? 77\r\n Urbanizacion Valle S?nchez)');
INSERT INTO `account` VALUES ('633', '1.1.2.1.02.055', 'Ctas. x cobrar B165 - Sc-108 Av.Doble Via La Guardia Uv 1 Mza 7', 'Apropiacion', 'B165 - SC-108 AV.DOBLE VIA LA GUARDIA UV 1 MZA 7 (Doble Via La Guardia UV1 Mza\r\n 7, Zona Sur Carretera a Cochabamba)');
INSERT INTO `account` VALUES ('634', '1.1.2.1.02.056', 'Ctas. x cobrar B166 - Sc-107 Av.Principal B. El Paraiso (El Torno)', 'Apropiacion', 'B166 - SC-107 AV.PRINCIPAL B. EL PARAISO (EL TORNO)    (Carretera Antigua a Cochabamba UV1 Manzana 139 Barrio El Para?so Localidad El Torno)');
INSERT INTO `account` VALUES ('635', '1.1.2.1.02.057', 'Ctas. x cobrar B169 - Sc-118 Calle Libertad Esq.La Paz (San Ignacio)', 'Apropiacion', 'B169 - SC-118 CALLE LIBERTAD ESQ.LA PAZ (SAN IGNACIO)    (Calle Libertad esquina La Paz)');
INSERT INTO `account` VALUES ('636', '1.1.2.2.02.049', 'Consignaciones B109 Sc-09 Argomosa Esq.Charcas', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('637', '1.1.2.2.02.050', 'Consignaciones B134 - Sc-41 Doble Via La Guardia Entre 6to.Y7mo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('638', '1.1.2.2.02.051', 'Consignaciones B145 - SC-60 AV.VALLE GRANDE Esq.5tO.ANI', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('639', '1.1.2.2.02.052', 'Consignaciones B152 - Sc-72 Calle 16 De Julio - Montero', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('640', '1.1.2.2.02.053', 'Consignaciones B154 - Sc-77 Av. 25 Mayo Warnes', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('641', '1.1.2.2.02.054', 'Consignaciones  B161 - Sc-95 C/Ofelia Sanchez Nro.777 B/ Valle Sanchez', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('642', '1.1.2.2.02.055', 'Consignaciones B165 - Sc-108 Av.Doble Via La Guardia Uv 1 Mza 7', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('643', '1.1.2.2.02.056', 'Consignaciones B166 - Sc-107 Av.Principal B. El Paraiso (El Torno)', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('644', '1.1.2.2.02.057', 'Consignaciones B169 - Sc-118 Calle Libertad Esq.La Paz (San Ignacio)', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('645', '1.1.3.1.01.020', 'Miel de 500gr.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('646', '1.1.3.2.01.013', 'Frasco de vidrio 370ml', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('647', '1.1.2.1.01.046', 'Ctas. x Cobrar a Lorena', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('648', '1.1.2.1.02.058', 'Ctas. x cobrar a B198-SC154 Av. Remanso Barrio La Santa Cruz', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('649', '1.1.2.2.02.058', 'Consingaciones B198-SC154 Av. El Remanso Barrio La Santa Cruz', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('650', '1.1.2.2.01.059', 'Consignaciones Americo de La Paz', 'Apropiacion', ' Americo Molina (distribuidor de La Paz)');
INSERT INTO `account` VALUES ('651', '1.1.2.1.01.047', 'Ctas. x cobrar a Americo de La Paz', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('652', '1.1.2.2.01.060', 'Consignaciones Marcela de La Paz', 'Apropiacion', 'CABALLERO ZULETA LOURDES MARCELA');
INSERT INTO `account` VALUES ('653', '1.1.2.1.01.048', 'Ctas. x cobrar Marcela de La Paz', 'Apropiacion', 'CABALLERO ZULETA LOURDES MARCELA');
INSERT INTO `account` VALUES ('654', '1.1.2.1.01.049', 'Ctas. x cobrar a Karina de Sucre', 'Apropiacion', ' Proveedora de Sucre ');
INSERT INTO `account` VALUES ('655', '1.1.2.2.01.061', 'Consignaciones Karina de Sucre', 'Apropiacion', ' Proveedora de Sucre');
INSERT INTO `account` VALUES ('656', '2.1.1.1.01.008', 'Cuentas por pagar general', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('657', '1.1.2.1.02.059', 'Ctas. x Cobrar a B119 Charcas Esq. 2do. anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('658', '1.1.2.2.02.059', 'Consignaciones B119 Charcas Esq. 2do. Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('659', '1.1.2.1.02.060', 'Ctas. x Cobrar a B127 Banzer Esq. 3er. anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('660', '1.1.2.2.02.060', 'Consignaciones B127 Banzer Esq. 3er. Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('661', '1.1.2.1.02.061', 'Ctas. x cobrar a B146 Busch Esq. 2do. Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('662', '1.1.2.2.02.061', 'Consignaciones B146 - Busch Esq. 2do. Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('663', '1.1.2.1.02.062', 'Ctas. x cobrar a B168 Cristo Redentor Esq. 2do. Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('664', '1.1.2.2.02.062', 'Consignaciones B168 Cristo Redentor Esq. 2do. Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('665', '1.1.2.1.02.063', 'Ctas. x cobrar a B110 Cañoto entre Landivar y Junin', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('666', '1.1.2.2.02.063', 'Consignaciones B110 Cañoto entre Landivar y Junin', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('667', '1.1.2.1.02.064', 'Ctas. x cobrar a B157 Av. Che Guevara 6to. Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('668', '1.1.2.2.02.064', 'Consignaciones B157 Av. Che Guevara 6to. Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('669', '1.1.2.1.02.065', 'Ctas. x cobrar a B185 Dr. Osvaldo Av. Paurito Esq. Calle 15', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('670', '1.1.2.2.02.065', 'Consignaciones B185 Dr. Osvaldo Av. Paurito Esq. Calle 15', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('671', '1.1.2.1.02.066', 'Ctas. x cobrar a B150 Biopetrol Royal', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('672', '1.1.2.2.02.066', 'Consignaciones B150 Biopetrol Royal', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('673', '1.1.2.1.02.067', 'Ctas. x cobrar a B196 Av. Radial 17 y 1/2 4to. Anillo B/Cañoto', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('674', '1.1.2.2.02.067', 'Consignaciones B196 Av. Radial 17 y 1/2 4to. Anillo B/Cañoto', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('675', '1.1.2.1.02.068', 'Ctas. x cobrar a B189 Av. Pirai 3er. Anillo Ext.#3131', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('676', '1.1.2.2.02.068', 'Consingaciones B189 Av. Pirai 3er. Anillo Ext.#3131', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('677', '1.1.2.1.02.069', 'Ctas. x cobrar a B194 Av. Beni 3er. Anillo Int.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('678', '1.1.2.2.02.069', 'Consignaciones B194 Av. Beni 3er. Anillo Int.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('679', '1.1.2.1.02.070', 'Ctas. x cobrar a B186 Dr. Osvaldo 3 pasos 4to anillo', 'Apropiacion', ' Dr. Osvaldo Av. 3 Pasos Al Frente esq. 4to anillo.');
INSERT INTO `account` VALUES ('680', '1.1.2.2.02.070', 'Consignaciones B186 Dr. Osvaldo 3 pasos 4to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('681', '1.1.2.1.02.071', 'Ctas. x cobrar a B113 Villa 1er de Mayo Av. Ppal', 'Apropiacion', 'B113 - SC-16 VILLA 1ro.DE MAYO Esq.CALLE 8');
INSERT INTO `account` VALUES ('682', '1.1.2.2.02.071', 'Consignaciones B113 Villa 1ero de Mayo Av. Ppal.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('683', '1.1.2.1.02.072', 'Ctas. x cobrar a B181 Dr. Osvaldo El Palmar', 'Apropiacion', 'B181 - SC- 134- DR.- OSVALDO-  EL PALMAR UV 180');
INSERT INTO `account` VALUES ('684', '1.1.2.2.02.072', 'Consignaciones B181 Dr. Osvaldo El Palmar', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('686', '1.1.3.2.01.015', 'Válvula spray 24/410', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('687', '1.1.3.2.01.016', 'Etiqueta de spray', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('688', '1.1.3.2.01.017', 'Cajita spray', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('689', '1.1.2.1.02.073', 'Ctas. x cobrar a B1PA Proxy Escuadron Velasco', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('690', '1.1.2.2.02.073', 'Consignaciones B1PA Proxy Escuadrón Velasco', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('692', '1.1.2.1.02.074', 'Ctas. x cobrar a B180 Dr. Osvaldo Mercado Nuevo Abasto', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('693', '1.1.2.2.02.074', 'Consignaciones B180 Dr. Osvaldo Mercado Nuevo Abasto', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('694', '1.1.2.1.02.075', 'Ctas. x cobrar a B187 Av. Cañoto esq. c/Ingavi', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('695', '1.1.2.2.02.075', 'Consignaciones B187 Av. Cañoto esq. c/Ingavi', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('696', '1.1.3.2.01.018', 'Etiqueta de goteros', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('697', '1.1.2.1.02.076', 'Ctas. x cobrar a B179 Dr. Osvaldo Av. Cumavi esq. Av. 16 de Julio', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('698', '1.1.2.2.02.076', 'Consignaciones B179 Dr. Osvaldo Av. Cumavi esq. Av. 16 de Julio', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('699', '1.1.2.1.02.077', 'Ctas. x cobrar a B178 Dr. Osvaldo Mercado Primavera', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('700', '1.1.2.2.02.077', 'Consignaciones B178 Dr. Osvaldo Mercado Primavera', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('701', '1.1.2.2.02.078', 'Consignaciones B197 Av. Stos. Dumont esq. Av. Pilcomayo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('702', '1.1.2.1.02.078', 'Ctas. x cobrar a B197 Av. Stos. Dumont esq. Av. Pilcomayo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('703', '1.1.2.1.02.079', 'Ctas. x cobrar a B177 Dr. Osvaldo Av. Miguel de Cervantes', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('704', '1.1.2.2.02.079', 'Consignaciones B177 Dr. Osvaldo Av. Miguel de Cervantes', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('705', '1.1.2.1.02.080', 'Ctas. x cobrar a B190 Dr. Osvaldo Av. 2 de Agosto esq. 5to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('706', '1.1.2.2.02.080', 'Consignaciones B190 Dr. Osvaldo Av. 2 de Agosto esq. 5to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('707', '1.1.2.2.02.081', 'Consignaciones B191 Dr. Osvaldo C/Caballero Zona P. El Arenal', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('708', '1.1.2.1.02.081', 'Ctas. x cobrar a B191 Dr. Osvaldo C/Caballero Zona P. El Arenal', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('709', '1.1.2.1.02.082', 'Ctas. x cobrar a B1AA Av. Banzer 8vo y 7mo anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('710', '1.1.2.2.02.082', 'Consignaciones B1AA Av. Banzer 8vo y 7mo anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('711', '1.1.2.2.02.083', 'Consignaciones B1AB Av. Banzer 7mo y 8vo anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('712', '1.1.2.1.02.083', 'Ctas. x cobrar a B1AB Av. Banzer 7mo y 8vo anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('713', '1.1.2.1.02.084', 'Ctas. x cobrar a B1AC Cambodromo 6to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('714', '1.1.2.2.02.084', 'Consignaciones B1AC Cambodromo 6to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('715', '1.1.2.1.02.085', 'Ctas. x cobrar a B1AD Av. Moscú y 6to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('716', '1.1.2.2.02.085', 'Consignaciones B1AD Av. Moscú y 6to Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('717', '1.1.2.1.02.086', 'Ctas. x cobrar a B101 C/21 de Mayo esq. Junin', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('718', '1.1.2.2.02.086', 'Consingaciones B101 C/21 de Mayo esq. Junin', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('719', '1.1.2.1.02.087', 'Ctas. x cobrar a B1PB Proxy C/Ismael Suarez Canal Isuto', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('720', '1.1.2.2.02.087', 'Consingaciones B1PB Proxy C/Ismael Suarez Canal Isuto', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('721', '1.1.2.1.02.088', 'Ctas. x cobrar a B195 Av. Noel Kempff (3er anillo) esq. C/9', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('722', '1.1.2.2.02.088', 'Consignaciones B195 Av. Noel Kemff(3er anillo) esq. C/9', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('723', '1.1.2.1.02.089', 'Ctas. x cobrar a B1AE Radial 27 4to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('724', '1.1.2.2.02.089', 'Consignaciones B1AE Radial 27 4to anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('725', '1.1.2.1.02.090', 'Ctas. x cobrar a B1AF Av. Piraí entre 6to y 7mo anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('726', '1.1.2.2.02.090', 'Consignaciones B1AF Av. Piraí entre 6to y 7mo anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('727', '1.1.2.1.02.091', 'Ctas. x cobrar a B176 Plza. ppal Montero', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('728', '1.1.2.2.02.091', 'Consignaciones B176 Plza. ppal Montero', 'Apropiacion', ' B176 - SC-137 PLAZA 2 DE DICIEMBRE ESQ.CALLE AVAROA MONTE    (Av. 24 de Septiembre Esq.\r\n Avaroa Plaza Principal de Montero)');
INSERT INTO `account` VALUES ('729', '1.1.3.1.01.021', 'Spray de miel/prop/vira-vira 30ml c/cajita', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('730', '1.1.3.2.01.019', 'Cajita gotero', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('731', '1.1.2.1.01.050', 'Ctas. x cobrar a Todo Market', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('732', '1.1.2.2.01.062', 'Consignaciones Todo Market', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('733', '1.1.1.1.04', 'Caja de Ahorro BMSC 4029553457', 'Subgrupo', null);
INSERT INTO `account` VALUES ('734', '1.1.3.1.01.022', 'Gotero de Extracto de Prop?leo 20ml c/cajita', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('735', '1.1.2.1.01.051', 'Ctas. x Cobrar a La Huerta II', 'Apropiacion', 'La Huerta II ');
INSERT INTO `account` VALUES ('736', '1.1.2.2.01.063', 'Consignaciones La Huerta II', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('737', '1.1.2.1.01.052', 'Ctas. x Cobrar a Samuel Quispe', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('738', '1.1.2.2.01.064', 'Consignaciones Samuel Quispe', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('739', '1.1.2.1.01.053', 'Ctas. x Cobrar a Ingrid Deneulin', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('740', '1.1.2.2.01.065', 'Consingaciones Ingrid Deneulin', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('741', '1.1.2.1.02.092', 'Ctas. x cobrar a B1AH', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('742', '1.1.2.2.02.092', 'Consignaciones B1AH Comercial Candire', 'Apropiacion', 'AV GRIGOTA N?3400 PASEO COMERCIAL CANDIRE');
INSERT INTO `account` VALUES ('743', '1.1.2.1.02.093', 'Ctas. x cobrar a BIAK Av. Mosc? 5to. anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('744', '1.1.2.2.02.093', 'Consignaciones B1AK Av. Mosc? 5to. anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('745', '1.1.2.1.02.094', 'Ctas. x cobrar a B188 Av. Virgen de Cotoca esq. C/3 Sur', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('746', '1.1.2.2.02.094', 'Consignaciones B188 Av. Virgen de Lujan esq. C/3 Sur', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('747', '1.1.2.1.02.095', 'Ctas. x cobrar a B1AJ Zona Norte Km11 1/2 Cond. Sevilla', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('748', '1.1.2.2.02.095', 'Consignaciones B1AJ Zona Norte Km11 1/2 Cond. Sevilla', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('749', '1.1.2.1.02.096', 'Ctas. x cobrar a B1AM Av. Alemana 5to. anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('750', '1.1.2.2.02.096', 'Consignaciones B1AM Av. Alemana 5to. anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('751', '1.1.2.1.02.097', 'Ctas. x cobrar a B1AN Av. Radial 27 5to. anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('752', '1.1.2.2.02.097', 'Consignaciones B1AN Av. Radial 27 5to. anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('753', '1.1.2.1.05', 'Costos por Cobrar', 'Subgrupo', null);
INSERT INTO `account` VALUES ('754', '1.1.2.1.01.054', 'Ctas. x cobrar a Cecilia Atom', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('755', '1.1.2.2.01.066', 'Consignaciones Cecilia Atom', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('756', '1.1.2.1.01.055', 'Ctas. x cobrar a Wonderful Los Cusis', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('757', '1.1.2.2.01.067', 'Consignaciones Wonderfull Los Cusis', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('758', '1.1.2.1.02.098', 'Ctas. x cobrar a B1AP 3er anillo int. udabol edif. Sha', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('759', '1.1.2.2.02.098', 'Consignaciones B1AP 3er anillo int. udabol edif. Sha', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('760', '1.1.2.1.02.099', 'Ctas. x cobrar a B1AQ Av. Bolivia esq. El Trillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('761', '1.1.2.2.02.099', 'Consignaciones B1AQ Av. Bolivia esq. El Trillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('762', '1.1.2.1.02.100', 'Ctas. x cobrar a B199 B/Conavi zona este uv40 mz. 29c', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('763', '1.1.2.2.02.100', 'Consignaciones B199 B/Conavi zona este uv40 mz. 29c', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('764', '1.1.2.1.02.101', 'Ctas. x cobrar a B1AI Centro Comercial Mutialista local 12 al. 18', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('765', '1.1.2.2.02.101', 'Consignaciones B1AI Centro Comercial Mutialista local 12 al. 18', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('766', '1.1.2.1.01.058', 'Ctas. x cobrar a Wonderful 8vo Anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('767', '1.1.2.2.01.070', 'Consignaciones Wonderful 8vo anillo', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('768', '1.1.2.1.01.056', 'Ctas. x cobrar a Daniela Parada', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('769', '1.1.2.2.01.068', 'Consignaciones Daniela Parada', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('770', '1.1.2.1.01.057', 'Cta.x cobrar a Rogelio Quispe', 'Apropiacion', null);
INSERT INTO `account` VALUES ('771', '1.1.2.2.01.069', 'Consignaciones Rogelio Quispe', 'Apropiacion', null);
INSERT INTO `account` VALUES ('772', '1.1.2.1.02.102', 'Cta.x cobrar a B1AU 7mo anillo entre 2 de Agosto y Alemana', 'Apropiacion', null);
INSERT INTO `account` VALUES ('773', '1.1.2.2.02.102', 'Consignaciones B1AU 7mo anillo entre 2 de Agosto y Alemana', 'Apropiacion', null);
INSERT INTO `account` VALUES ('774', '1.1.2.1.02.103', 'Cta.x cobrar a B1AX Av. Doble Via La Guardia 8vo. anillo uv 138', 'Apropiacion', null);
INSERT INTO `account` VALUES ('775', '1.1.2.2.02.103', 'Consignaciones B1AX Av. Doble Via La Guardia 8vo. anillo uv 138', 'Apropiacion', null);
INSERT INTO `account` VALUES ('776', '1.1.2.1.01.059', 'Cta.x cobrar a Farmacia Hipermaxi', 'Apropiacion', null);
INSERT INTO `account` VALUES ('777', '1.1.2.2.01.071', 'Consignaciones Farmacia Hipermaxi', 'Apropiacion', null);
INSERT INTO `account` VALUES ('778', '1.1.2.1.02.104', 'Cta.x cobrar a B1AS Dr. Osvaldo Av. Virgen de Cotoca 6to ani.', 'Apropiacion', null);
INSERT INTO `account` VALUES ('779', '1.1.2.2.02.104', 'Consignaciones B1AS Dr. Osvaldo Av. Virgen de Cotoca 6to ani.', 'Apropiacion', null);
INSERT INTO `account` VALUES ('780', '1.1.2.1.02.105', 'Cta.x cobrar a B1BB Farmacorp Av. La Campana 7mo. anillo', 'Apropiacion', null);
INSERT INTO `account` VALUES ('781', '1.1.2.2.02.105', 'Consignaciones B1BB Farmacorp Av. La Campana 7mo. anillo', 'Apropiacion', null);
INSERT INTO `account` VALUES ('782', '1.1.2.1.02.106', 'Cta.x cobrar a B1AR Farmacorp Av. San Martin esq. C/3 Norte', 'Apropiacion', null);
INSERT INTO `account` VALUES ('783', '1.1.2.2.02.106', 'Consignaciones B1AR Farmacorp Av. San Martin esq. C/3 Norte', 'Apropiacion', null);
INSERT INTO `account` VALUES ('784', '1.1.2.1.02.107', 'Cta.x cobrar a B1AL Radial 10 esq. Av. Che Guevara', 'Apropiacion', null);
INSERT INTO `account` VALUES ('785', '1.1.2.2.02.107', 'Consignaciones B1AL Radial 10 esq. Av. Che Guevara', 'Apropiacion', null);
INSERT INTO `account` VALUES ('786', '1.1.2.1.01.060', 'Cta.x cobrar a Consignaciones Feria 2', 'Apropiacion', null);
INSERT INTO `account` VALUES ('787', '1.1.2.2.01.072', 'Consignaciones Consignaciones Feria 2', 'Apropiacion', null);
INSERT INTO `account` VALUES ('788', '1.1.2.1.01.061', 'Cta.x cobrar a Naty', 'Apropiacion', null);
INSERT INTO `account` VALUES ('790', '7.1.2.1.03.036', 'Pago a Impulsadoras/Vendedoras', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('791', '1.1.3.2.01.020', 'Etiqueta Propomiel', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('792', '1.1.3.2.01.021', 'Etiqueta Apienergetico', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('793', '1.1.2.1.01.062', 'Cta.x cobrar a Vida y Salud', 'Apropiacion', null);
INSERT INTO `account` VALUES ('795', '1.1.2.2.01.073', 'Consignaciones Naty', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('796', '1.1.2.2.01.074', 'Consignaciones Vida y Salud', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('797', '1.1.2.1.02.108', 'Cta.x cobrar a B1BC Urb. Pampa De La Cruz Villa 1ero. de Mayo', 'Apropiacion', null);
INSERT INTO `account` VALUES ('798', '1.1.2.2.02.108', 'Consignaciones B1BC Urb. Pampa De La Cruz Villa 1ero. de Mayo', 'Apropiacion', null);
INSERT INTO `account` VALUES ('799', '1.1.2.1.02.109', 'Cta.x cobrar a B1BE Av. Doble Via La Guardia y 5to. anillo', 'Apropiacion', null);
INSERT INTO `account` VALUES ('800', '1.1.2.2.02.109', 'Consignaciones B1BE Av. Doble Via La Guardia y 5to. anillo', 'Apropiacion', null);
INSERT INTO `account` VALUES ('801', '1.1.2.1.02.110', 'Cta.x cobrar a B1AO Av. Brasil y 2do. Anillo', 'Apropiacion', null);
INSERT INTO `account` VALUES ('802', '1.1.2.2.02.110', 'Consignaciones B1AO Av. Brasil y 2do. Anillo', 'Apropiacion', null);
INSERT INTO `account` VALUES ('803', '1.1.2.1.02.111', 'Cta.x cobrar a B1BF B/Caminero 5 de Octubre', 'Apropiacion', null);
INSERT INTO `account` VALUES ('804', '1.1.2.2.02.111', 'Consignaciones B1BF B/Caminero 5 de Octubre', 'Apropiacion', null);
INSERT INTO `account` VALUES ('805', '1.1.2.1.01.063', 'Cta.x cobrar a Mery Yuli Monrroy LP', 'Apropiacion', null);
INSERT INTO `account` VALUES ('806', '1.1.2.2.01.075', 'Consignaciones Mery Yuli Monrroy LP', 'Apropiacion', null);
INSERT INTO `account` VALUES ('807', '1.1.2.1.01.064', 'Cta.x cobrar a Halal Tienda', 'Apropiacion', null);
INSERT INTO `account` VALUES ('808', '1.1.2.2.01.076', 'Consignaciones Halal Tienda', 'Apropiacion', null);
INSERT INTO `account` VALUES ('809', '1.1.2.1.02.112', 'Cta.x cobrar a B100 CEDIS Farmacorp', 'Apropiacion', null);
INSERT INTO `account` VALUES ('810', '1.1.2.2.02.112', 'Consignaciones B100 CEDIS Farmacorp', 'Apropiacion', null);
INSERT INTO `account` VALUES ('811', '1.1.3.2.01.022', 'Tapa de frasco 28ml.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('812', '1.1.3.2.01.023', 'Tapa dorada para fco. 212ml.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('813', '1.1.3.2.01.024', 'Etiqueta para crema coco', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('814', '1.1.2.1.01.065', 'Cta.x cobrar a Santiago Productos', 'Apropiacion', null);
INSERT INTO `account` VALUES ('815', '1.1.2.2.01.077', 'Consignaciones Santiago Productos', 'Apropiacion', null);
INSERT INTO `account` VALUES ('816', '7.1.4.1.05.053', 'Costo envio/transporte insumos', 'Apropiacion', 'Pago de taxi o flota.');
INSERT INTO `account` VALUES ('817', '7.1.4.2.06.057', 'Costo Propoleo Solido en Bruto (no se está usando)', 'Apropiacion', '');
INSERT INTO `account` VALUES ('818', '1.1.3.2.01.025', 'Frasco plastico 110ml. c/tapa dispensadora', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('819', '1.1.3.1.01.023', 'Miel 150gr. (110ml)', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('820', '7.1.4.1.05.054', 'Costo frasco de plastico 110ml. (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('821', '7.1.4.1.05.055', 'Costo valvula spray (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('822', '7.1.4.1.05.056', 'Costo Cajita Gotero (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('823', '7.1.4.1.05.057', 'Costo cajita spray (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('824', '7.1.4.1.05.058', 'Costo Etiqueta spray (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('825', '7.1.4.1.05.059', 'Costo Frasco de vidrio 370ml (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('826', '7.1.4.1.05.060', 'Costo Etiqueta gotero (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('827', '1.1.3.2.01.026', 'Frasco Plastico hexagonal 212ml. c/dispensador', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('828', '7.1.4.1.05.061', 'Costo Frasco plastico 212ml. (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('829', '1.1.2.1.01.066', 'Cta.x cobrar a Agasaja Tienda Virtual', 'Apropiacion', null);
INSERT INTO `account` VALUES ('830', '1.1.2.2.01.078', 'Consignaciones Agasaja Tienda Virtual', 'Apropiacion', null);
INSERT INTO `account` VALUES ('831', '1.1.3.2.01.027', 'Etiqueta Miel 500gr.', 'Apropiacion', 'Etiqueta miel 500gr. ');
INSERT INTO `account` VALUES ('832', '7.1.4.1.05.062', 'Costo etiqueta miel 500gr. (no se está usando)', 'Apropiacion', 'Costo etiqueta miel 500gr.  (no se está usando)');
INSERT INTO `account` VALUES ('833', '7.1.4.1.05.063', 'Costo frasco de vidrio 460ml. (no se está usando)', 'Apropiacion', 'Para miel 500gr.  (no se está usando)');
INSERT INTO `account` VALUES ('834', '7.1.4.1.05.064', 'Costo Tapa dorada fco. 212ml. (no se está usando)', 'Apropiacion', '  (no se está usando)');
INSERT INTO `account` VALUES ('835', '1.1.3.2.01.028', 'Tapa dorada fco. 212ml.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('836', '1.1.3.2.01.029', 'Etiqueta miel 250gr.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('837', '1.1.3.2.01.030', 'Etiqueta miel 150gr.', 'Apropiacion', ' ');
INSERT INTO `account` VALUES ('838', '1.1.2.3', 'Intereses por cobrar', 'General', null);
INSERT INTO `account` VALUES ('839', '1.1.2.3.1', 'Intereses por cobrar', 'Grupo', null);
INSERT INTO `account` VALUES ('840', '1.1.2.3.01', 'Intereses por cobrar a bancos', 'Subgrupo', null);

-- ----------------------------
-- Table structure for `apiario`
-- ----------------------------
DROP TABLE IF EXISTS `apiario`;
CREATE TABLE `apiario` (
  `id_apiario` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` char(15) NOT NULL,
  `coordenadas` char(24) DEFAULT NULL,
  `comentarios` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_apiario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apiario
-- ----------------------------
INSERT INTO `apiario` VALUES ('1', 'PAICHANÉ', null, 'Apiario e herradura 1 de la derecha');
INSERT INTO `apiario` VALUES ('2', 'TAJIBO', null, 'Apiario de 2 colmenas');
INSERT INTO `apiario` VALUES ('3', 'PATUJÚ', null, 'Apiario lineal 1 de la izq.');
INSERT INTO `apiario` VALUES ('4', 'PARAJOBOBO', null, 'Apiario lineal 2 de la izq.');
INSERT INTO `apiario` VALUES ('5', 'CARI-CARI', null, 'Apiario en herradura 2 de la der.');
INSERT INTO `apiario` VALUES ('6', 'SIMEQUIERES', null, 'Apiario cerca de la brecha');

-- ----------------------------
-- Table structure for `aux_pagos_farmacorp_por_consignatario`
-- ----------------------------
DROP TABLE IF EXISTS `aux_pagos_farmacorp_por_consignatario`;
CREATE TABLE `aux_pagos_farmacorp_por_consignatario` (
  `entry_date` char(10) DEFAULT NULL,
  `cbte_cont_nro` char(20) DEFAULT NULL,
  `balance` decimal(13,2) DEFAULT NULL,
  `details` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aux_pagos_farmacorp_por_consignatario
-- ----------------------------

-- ----------------------------
-- Table structure for `balance_checksum`
-- ----------------------------
DROP TABLE IF EXISTS `balance_checksum`;
CREATE TABLE `balance_checksum` (
  `checksum_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `checksum_date` datetime NOT NULL,
  `checksum` decimal(13,2) NOT NULL DEFAULT '0.00',
  `budget` decimal(13,2) DEFAULT NULL,
  `cbte_cont_nro` varchar(30) DEFAULT NULL,
  `balance` decimal(13,2) DEFAULT '0.00',
  PRIMARY KEY (`checksum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3499 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of balance_checksum
-- ----------------------------

-- ----------------------------
-- Table structure for `bitacora`
-- ----------------------------
DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE `bitacora` (
  `bitacora_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `cuerpo` varchar(3500) DEFAULT NULL,
  PRIMARY KEY (`bitacora_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bitacora
-- ----------------------------

-- ----------------------------
-- Table structure for `configuration`
-- ----------------------------
DROP TABLE IF EXISTS `configuration`;
CREATE TABLE `configuration` (
  `config_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  PRIMARY KEY (`config_id`),
  UNIQUE KEY `idx_config1` (`config_name`) USING BTREE,
  UNIQUE KEY `idx_config2` (`config_value`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of configuration
-- ----------------------------
INSERT INTO `configuration` VALUES ('1', 'COSTOS X COBRAR', '371');
INSERT INTO `configuration` VALUES ('2', 'CTA. VENTA DE PRODUCTOS TERMINADOS', '153');
INSERT INTO `configuration` VALUES ('3', 'Costos de produccion de productos', '430');
INSERT INTO `configuration` VALUES ('4', 'Cta. Caja General', '432');
INSERT INTO `configuration` VALUES ('5', 'Ganancias por venta de productos', '595');
INSERT INTO `configuration` VALUES ('6', 'Utilidades para socios', '268');
INSERT INTO `configuration` VALUES ('7', 'Caja de ahorro Mano de Obra', '579');
INSERT INTO `configuration` VALUES ('8', 'Caja de ahorro Envases', '413');
INSERT INTO `configuration` VALUES ('9', 'Caja de ahorro Costos de comercializacion', '419');
INSERT INTO `configuration` VALUES ('10', 'Caja de ahorro Reserva', '433');
INSERT INTO `configuration` VALUES ('11', 'Caja de ahorro para impuestos', '435');
INSERT INTO `configuration` VALUES ('12', 'Caja de ahorro Costos Prod. Mat. Primas', '581');
INSERT INTO `configuration` VALUES ('13', 'Caja de ahorro Utilidades', '582');
INSERT INTO `configuration` VALUES ('14', 'Caja de ahorro Costos Produccion', '434');
INSERT INTO `configuration` VALUES ('15', 'Codigo cuenta general', '1.1.1.1.03');

-- ----------------------------
-- Table structure for `consignee`
-- ----------------------------
DROP TABLE IF EXISTS `consignee`;
CREATE TABLE `consignee` (
  `consig_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `consig_name` char(255) NOT NULL,
  `consig_tel` char(15) DEFAULT NULL,
  `consig_addr` char(255) DEFAULT NULL,
  `consig_coord` char(30) DEFAULT NULL,
  `consig_details` varchar(500) DEFAULT NULL,
  `consig_activo` char(8) DEFAULT 'ACTIVO',
  `account_id` bigint(20) DEFAULT NULL,
  `ctas_por_cobrar_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`consig_id`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of consignee
-- ----------------------------

-- ----------------------------
-- Table structure for `consig_prod`
-- ----------------------------
DROP TABLE IF EXISTS `consig_prod`;
CREATE TABLE `consig_prod` (
  `consig_prod_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `consig_id` smallint(5) unsigned NOT NULL,
  `product_id` tinyint(4) NOT NULL,
  `consig_date` datetime NOT NULL,
  `mov_type` char(10) NOT NULL DEFAULT 'ENTRADA',
  `cant` smallint(4) NOT NULL DEFAULT '0',
  `balance` smallint(6) NOT NULL DEFAULT '0',
  `owes` smallint(6) NOT NULL DEFAULT '0',
  `topay` smallint(6) NOT NULL DEFAULT '0',
  `unit_price` decimal(13,2) DEFAULT '0.00',
  `total_price` decimal(13,2) DEFAULT '0.00',
  `cbte_cont_tipo` varchar(30) DEFAULT NULL,
  `cbte_cont_nro` varchar(30) DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`consig_prod_id`),
  KEY `fk_consig_id1` (`consig_id`),
  CONSTRAINT `fk_consig_id1` FOREIGN KEY (`consig_id`) REFERENCES `consignee` (`consig_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10456 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of consig_prod
-- ----------------------------

-- ----------------------------
-- Table structure for `directive`
-- ----------------------------
DROP TABLE IF EXISTS `directive`;
CREATE TABLE `directive` (
  `directive_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_functionality` int(10) unsigned NOT NULL,
  `id_users_group` int(10) unsigned NOT NULL,
  `directive_rule` char(20) NOT NULL DEFAULT 'PERMITIR' COMMENT 'PERMITIR/DENEGAR',
  PRIMARY KEY (`directive_id`),
  KEY `fk_id_functionality` (`id_functionality`),
  KEY `fk_id_users_group1` (`id_users_group`),
  CONSTRAINT `fk_id_functionality` FOREIGN KEY (`id_functionality`) REFERENCES `functionality` (`id_functionality`) ON UPDATE CASCADE,
  CONSTRAINT `fk_id_users_group1` FOREIGN KEY (`id_users_group`) REFERENCES `users_group` (`id_users_group`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of directive
-- ----------------------------
INSERT INTO `directive` VALUES ('1', '13', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('2', '14', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('3', '15', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('4', '16', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('5', '17', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('6', '18', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('7', '19', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('8', '20', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('9', '21', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('10', '22', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('11', '23', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('12', '24', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('13', '25', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('14', '26', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('15', '27', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('16', '28', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('17', '29', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('18', '30', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('19', '31', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('20', '32', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('21', '33', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('22', '34', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('23', '35', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('24', '36', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('25', '14', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('26', '15', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('27', '16', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('28', '18', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('29', '21', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('30', '22', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('31', '23', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('32', '26', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('33', '27', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('34', '28', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('35', '29', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('36', '30', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('37', '33', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('38', '35', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('39', '36', '11', 'PERMITIR');
INSERT INTO `directive` VALUES ('66', '38', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('67', '39', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('69', '41', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('70', '42', '10', 'PERMITIR');
INSERT INTO `directive` VALUES ('71', '42', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('72', '43', '10', 'PERMITIR');
INSERT INTO `directive` VALUES ('73', '43', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('74', '44', '12', 'PERMITIR');
INSERT INTO `directive` VALUES ('75', '45', '12', 'PERMITIR');

-- ----------------------------
-- Table structure for `entry`
-- ----------------------------
DROP TABLE IF EXISTS `entry`;
CREATE TABLE `entry` (
  `entry_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entry_date` datetime NOT NULL,
  `details` varchar(500) DEFAULT NULL,
  `balance` decimal(13,5) NOT NULL DEFAULT '0.00000',
  `account_id` bigint(20) unsigned NOT NULL,
  `user_id` tinyint(3) unsigned DEFAULT NULL,
  `cbte_cont_tipo` varchar(30) DEFAULT NULL,
  `cbte_cont_nro` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `fk_account_id` (`account_id`),
  KEY `fk_user_id02` (`user_id`),
  CONSTRAINT `fk_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_user_id02` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77264 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of entry
-- ----------------------------

-- ----------------------------
-- Table structure for `functionality`
-- ----------------------------
DROP TABLE IF EXISTS `functionality`;
CREATE TABLE `functionality` (
  `id_functionality` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `func_name` varchar(100) NOT NULL,
  `icon_name` varchar(200) DEFAULT NULL,
  `func_link` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_functionality`),
  UNIQUE KEY `idx1_func_name` (`func_name`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of functionality
-- ----------------------------
INSERT INTO `functionality` VALUES ('13', 'Asientos', null, null);
INSERT INTO `functionality` VALUES ('14', 'Libro Diário', null, null);
INSERT INTO `functionality` VALUES ('15', 'Resultados', null, null);
INSERT INTO `functionality` VALUES ('16', 'Plan de Cuentas', null, null);
INSERT INTO `functionality` VALUES ('17', 'Nueva Cuenta', null, null);
INSERT INTO `functionality` VALUES ('18', 'Libro Mayor', null, null);
INSERT INTO `functionality` VALUES ('19', 'Nuevo Movimiento de Producto/Ingrediente', null, null);
INSERT INTO `functionality` VALUES ('20', 'Nuevo Movimiento de Material Indirecto', null, null);
INSERT INTO `functionality` VALUES ('21', 'Lista de movimientos de prod/ingr', null, null);
INSERT INTO `functionality` VALUES ('22', 'Lista de mov. materiales indirectos', null, null);
INSERT INTO `functionality` VALUES ('23', 'Stock general', null, null);
INSERT INTO `functionality` VALUES ('24', 'Consignaciones', null, null);
INSERT INTO `functionality` VALUES ('25', 'Nuevo Consignatário', null, null);
INSERT INTO `functionality` VALUES ('26', 'Últimos Movimientos', null, null);
INSERT INTO `functionality` VALUES ('27', 'Últimos Pagos', null, null);
INSERT INTO `functionality` VALUES ('28', 'Lista de Consignatários', null, null);
INSERT INTO `functionality` VALUES ('29', 'Consulta de Ventas x Producto Pagadas', null, null);
INSERT INTO `functionality` VALUES ('30', 'Presupuesto', null, null);
INSERT INTO `functionality` VALUES ('31', 'Ahorro vs. Gasto', null, null);
INSERT INTO `functionality` VALUES ('32', 'Nueva Bitácora', null, null);
INSERT INTO `functionality` VALUES ('33', 'Ver Bitácora', null, null);
INSERT INTO `functionality` VALUES ('34', 'Nuevo Pendiente', null, null);
INSERT INTO `functionality` VALUES ('35', 'Lista de pendientes', null, null);
INSERT INTO `functionality` VALUES ('36', 'Listado de posiciones', null, null);
INSERT INTO `functionality` VALUES ('37', 'Pendientes Empresa', null, null);
INSERT INTO `functionality` VALUES ('38', 'Consulta Ventas x Producto Salidas', null, null);
INSERT INTO `functionality` VALUES ('39', 'Consulta farmacorps con más salidas', null, null);
INSERT INTO `functionality` VALUES ('41', 'Consulta farmacorps con más salidas a 60 días', null, null);
INSERT INTO `functionality` VALUES ('42', 'Consignatários con mayor stock de spray', null, null);
INSERT INTO `functionality` VALUES ('43', 'Salidas Farmacorp x Mes', null, null);
INSERT INTO `functionality` VALUES ('44', 'Precio del Insumo', null, null);
INSERT INTO `functionality` VALUES ('45', 'Reporte historia de posiciones', null, null);

-- ----------------------------
-- Table structure for `movement`
-- ----------------------------
DROP TABLE IF EXISTS `movement`;
CREATE TABLE `movement` (
  `mov_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mov_type` char(10) NOT NULL DEFAULT 'SALIDA',
  `mov_date` datetime NOT NULL,
  `mov_cant` decimal(10,2) NOT NULL DEFAULT '1.00',
  `mov_lot` char(15) DEFAULT NULL,
  `product_id` tinyint(4) DEFAULT NULL,
  `comments` varchar(400) DEFAULT NULL,
  `user_id` tinyint(3) unsigned DEFAULT NULL,
  `reason` char(15) DEFAULT NULL,
  PRIMARY KEY (`mov_id`),
  KEY `fk_product02` (`product_id`),
  KEY `fk_user_id04` (`user_id`),
  CONSTRAINT `fk_product02` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  CONSTRAINT `fk_user_id04` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6612 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of movement
-- ----------------------------

-- ----------------------------
-- Table structure for `mov_supply`
-- ----------------------------
DROP TABLE IF EXISTS `mov_supply`;
CREATE TABLE `mov_supply` (
  `mov_supply_id` int(10) NOT NULL AUTO_INCREMENT,
  `mov_supply_type` char(10) NOT NULL DEFAULT 'ENTRADA',
  `mov_supply_date` datetime NOT NULL,
  `mov_supply_cant` int(11) NOT NULL DEFAULT '1',
  `mov_supply_lot` char(15) DEFAULT NULL,
  `supply_id` tinyint(4) NOT NULL,
  `comments` varchar(400) DEFAULT NULL,
  `user_id` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`mov_supply_id`),
  KEY `fk_supply_id02` (`supply_id`),
  KEY `fk_user_id03` (`user_id`),
  CONSTRAINT `fk_supply_id02` FOREIGN KEY (`supply_id`) REFERENCES `supply` (`supply_id`),
  CONSTRAINT `fk_user_id03` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=859 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mov_supply
-- ----------------------------

-- ----------------------------
-- Table structure for `pendiente`
-- ----------------------------
DROP TABLE IF EXISTS `pendiente`;
CREATE TABLE `pendiente` (
  `pendientes_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `cuerpo` varchar(3500) DEFAULT NULL,
  `realizado` char(1) NOT NULL DEFAULT 'N' COMMENT 'N=NO;S=SI',
  PRIMARY KEY (`pendientes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pendiente
-- ----------------------------

-- ----------------------------
-- Table structure for `pend_empresa`
-- ----------------------------
DROP TABLE IF EXISTS `pend_empresa`;
CREATE TABLE `pend_empresa` (
  `pend_empresa_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `cuerpo` varchar(3500) DEFAULT NULL,
  `responsable` char(50) DEFAULT NULL,
  `realizado` char(1) NOT NULL DEFAULT 'N' COMMENT 'N=NO;S=SI',
  PRIMARY KEY (`pend_empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pend_empresa
-- ----------------------------

-- ----------------------------
-- Table structure for `posic_descrip_hist`
-- ----------------------------
DROP TABLE IF EXISTS `posic_descrip_hist`;
CREATE TABLE `posic_descrip_hist` (
  `posic_descrip_hist_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `posic_descrip_hsit_date` datetime DEFAULT NULL,
  `position_id` tinyint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`posic_descrip_hist_id`),
  KEY `fk_posicion_id5` (`position_id`),
  CONSTRAINT `fk_posicion_id5` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posic_descrip_hist
-- ----------------------------

-- ----------------------------
-- Table structure for `posic_salud_hist`
-- ----------------------------
DROP TABLE IF EXISTS `posic_salud_hist`;
CREATE TABLE `posic_salud_hist` (
  `posic_salud_hist_id` int(11) NOT NULL AUTO_INCREMENT,
  `salud` char(20) NOT NULL DEFAULT 'BUENA',
  `posic_salud_hist_date` datetime DEFAULT NULL,
  `position_id` tinyint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`posic_salud_hist_id`),
  KEY `fk_position_id6` (`position_id`),
  CONSTRAINT `fk_position_id6` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posic_salud_hist
-- ----------------------------

-- ----------------------------
-- Table structure for `position`
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `position_id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `pos_name` char(255) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `coordenadas` char(255) DEFAULT NULL,
  `salud` char(20) DEFAULT 'BUENA',
  `id_apiario` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`position_id`),
  UNIQUE KEY `idx_pos1` (`pos_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of position
-- ----------------------------

-- ----------------------------
-- Table structure for `pos_history`
-- ----------------------------
DROP TABLE IF EXISTS `pos_history`;
CREATE TABLE `pos_history` (
  `pos_hist_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pos_hist_date` datetime NOT NULL,
  `pos_hist_body` varchar(3500) DEFAULT NULL,
  `position_id` tinyint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`pos_hist_id`),
  UNIQUE KEY `idx_pos_history1` (`pos_hist_date`,`position_id`) USING BTREE,
  KEY `fk_position_id1` (`position_id`),
  CONSTRAINT `fk_position_id1` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=559 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pos_history
-- ----------------------------

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `product_name` char(255) NOT NULL,
  `presentation` char(50) NOT NULL COMMENT 'frasco, gotero, spry, pote,chup-chup',
  `unit` char(10) NOT NULL,
  `stock` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comments` varchar(400) DEFAULT NULL,
  `preparation` varchar(500) DEFAULT NULL,
  `utility` decimal(5,2) DEFAULT NULL,
  `employee_cost` decimal(5,2) DEFAULT NULL,
  `production_cost` decimal(10,5) DEFAULT '0.00000',
  `account_id` bigint(20) unsigned DEFAULT NULL,
  `status` char(8) DEFAULT 'ACTIVO',
  `stock_min` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_account_id1` (`account_id`),
  CONSTRAINT `fk_account_id1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------

-- ----------------------------
-- Table structure for `product_cost`
-- ----------------------------
DROP TABLE IF EXISTS `product_cost`;
CREATE TABLE `product_cost` (
  `prod_cost_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost_name` varchar(255) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `cost_type` char(15) DEFAULT 'VENTA',
  `saving_type` char(15) DEFAULT NULL,
  `saving_id` bigint(20) unsigned DEFAULT NULL,
  `account_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`prod_cost_id`),
  KEY `fk_account_id3` (`account_id`),
  KEY `fk_account_id7` (`saving_id`),
  CONSTRAINT `fk_account_id3` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_account_id7` FOREIGN KEY (`saving_id`) REFERENCES `account` (`account_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_cost
-- ----------------------------

-- ----------------------------
-- Table structure for `product_price`
-- ----------------------------
DROP TABLE IF EXISTS `product_price`;
CREATE TABLE `product_price` (
  `prod_price_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` decimal(10,5) NOT NULL,
  `start_date` datetime NOT NULL,
  `comments` varchar(400) CHARACTER SET latin1 DEFAULT NULL,
  `product_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`prod_price_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_price_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_price
-- ----------------------------

-- ----------------------------
-- Table structure for `product_product`
-- ----------------------------
DROP TABLE IF EXISTS `product_product`;
CREATE TABLE `product_product` (
  `product_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` tinyint(4) NOT NULL,
  `ingredient_id` tinyint(4) NOT NULL,
  `cant` decimal(10,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`product_product_id`),
  UNIQUE KEY `idx_prod_ingrd01` (`ingredient_id`,`product_id`) USING BTREE,
  KEY `fk_ingredient` (`ingredient_id`),
  KEY `fk_product` (`product_id`),
  CONSTRAINT `fk_ingredient` FOREIGN KEY (`ingredient_id`) REFERENCES `product` (`product_id`),
  CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_product
-- ----------------------------

-- ----------------------------
-- Table structure for `product_supply`
-- ----------------------------
DROP TABLE IF EXISTS `product_supply`;
CREATE TABLE `product_supply` (
  `product_suppy_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` tinyint(4) NOT NULL,
  `supply_id` tinyint(4) NOT NULL,
  `cant` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`product_suppy_id`),
  UNIQUE KEY `idx_001` (`product_id`,`supply_id`) USING BTREE,
  KEY `fk_supply01` (`supply_id`),
  CONSTRAINT `fk_product01` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  CONSTRAINT `fk_supply01` FOREIGN KEY (`supply_id`) REFERENCES `supply` (`supply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_supply
-- ----------------------------

-- ----------------------------
-- Table structure for `prod_cost_prod`
-- ----------------------------
DROP TABLE IF EXISTS `prod_cost_prod`;
CREATE TABLE `prod_cost_prod` (
  `prod_cost_prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` tinyint(4) NOT NULL,
  `prod_cost_id` int(11) NOT NULL,
  `cost_value` decimal(10,5) NOT NULL DEFAULT '0.00000',
  PRIMARY KEY (`prod_cost_prod_id`),
  UNIQUE KEY `idx_prod_cost1` (`product_id`,`prod_cost_id`) USING BTREE,
  KEY `fk_prod_cost_id1` (`prod_cost_id`),
  CONSTRAINT `fk_prod_cost_id1` FOREIGN KEY (`prod_cost_id`) REFERENCES `product_cost` (`prod_cost_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_product_id3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prod_cost_prod
-- ----------------------------

-- ----------------------------
-- Table structure for `supply`
-- ----------------------------
DROP TABLE IF EXISTS `supply`;
CREATE TABLE `supply` (
  `supply_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `supply_name` char(255) NOT NULL,
  `unit` char(10) NOT NULL,
  `stock` bigint(11) NOT NULL DEFAULT '0',
  `price` decimal(10,5) DEFAULT '0.00000',
  `comments` varchar(400) DEFAULT NULL,
  `account_id` bigint(20) unsigned DEFAULT NULL,
  `stock_min` int(11) DEFAULT NULL,
  `cost_account_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`supply_id`),
  KEY `fk_account_id03` (`account_id`),
  KEY `fk_cost_account_id01` (`cost_account_id`),
  CONSTRAINT `fk_account_id03` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_cost_account_id01` FOREIGN KEY (`cost_account_id`) REFERENCES `account` (`account_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of supply
-- ----------------------------

-- ----------------------------
-- Table structure for `supply_price`
-- ----------------------------
DROP TABLE IF EXISTS `supply_price`;
CREATE TABLE `supply_price` (
  `supply_price_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` decimal(10,5) NOT NULL,
  `start_date` datetime NOT NULL,
  `comments` varchar(400) CHARACTER SET latin1 DEFAULT NULL,
  `supply_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`supply_price_id`),
  KEY `fk_supply_id01` (`supply_id`),
  CONSTRAINT `supply_price_ibfk_1` FOREIGN KEY (`supply_id`) REFERENCES `supply` (`supply_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of supply_price
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` char(10) NOT NULL,
  `user_password` char(10) NOT NULL,
  `id_users_group` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_users_group` (`id_users_group`),
  CONSTRAINT `fk_users_group` FOREIGN KEY (`id_users_group`) REFERENCES `users_group` (`id_users_group`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('3', 'Eliana', '123456', '11');
INSERT INTO `user` VALUES ('4', 'Leonardo', 'papanoel', '12');
INSERT INTO `user` VALUES ('5', 'Mauricio', '123456', '11');

-- ----------------------------
-- Table structure for `users_group`
-- ----------------------------
DROP TABLE IF EXISTS `users_group`;
CREATE TABLE `users_group` (
  `id_users_group` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id_users_group`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_group
-- ----------------------------
INSERT INTO `users_group` VALUES ('10', 'General');
INSERT INTO `users_group` VALUES ('11', 'Viwers');
INSERT INTO `users_group` VALUES ('12', 'Administrators');
