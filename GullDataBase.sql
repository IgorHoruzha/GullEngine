-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 27 2018 г., 05:50
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `GullDataBase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Content`
--

CREATE TABLE `Content` (
  `ID` int(11) NOT NULL,
  `MENU_ID` int(11) DEFAULT NULL,
  `LINING` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Content`
--

INSERT INTO `Content` (`ID`, `MENU_ID`, `LINING`) VALUES
(0, 0, 0x3c6469763e0d0a090909093c6833207374796c653d22746578742d616c69676e3a2063656e7465723b6d617267696e2d746f703a31357078223e47756c6c20456e67696e6520486f6d6520706167653c2f68333e0d0a090909093c64697620636c6173733d22636f6e7461696e657220726f77223e0d0a090909092020203c64697620207374796c653d226d696e2d6865696768743a2032303070783b666f6e742d7765696768743a20626f6c643b6d617267696e2d746f703a20323570782220636c6173733d22636f6e7461696e657220636f6c2d6d642d34223e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e20457865726369746174696f6e656d207365717569206469676e697373696d6f732076656e69616d20696c6c6f206d696e757320636f6e736571756174757220667567696174206e656d6f206576656e69657420646f6c6f72652074656d706f726120736f6c757461206975726520736564206e6f6269732073617069656e74652c2070726f766964656e742065756d2073696d696c69717565206163637573616e7469756d2071756f642e3c2f6469763e0d0a202020202020202020202020202020202020203c64697620207374796c653d226d696e2d6865696768743a2032303070783b666f6e742d7765696768743a20626f6c643b6d617267696e2d746f703a20323570782220636c6173733d22636f6e7461696e657220636f6c2d6d642d34223e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e20457865726369746174696f6e656d207365717569206469676e697373696d6f732076656e69616d20696c6c6f206d696e757320636f6e736571756174757220667567696174206e656d6f206576656e69657420646f6c6f72652074656d706f726120736f6c757461206975726520736564206e6f6269732073617069656e74652c2070726f766964656e742065756d2073696d696c69717565206163637573616e7469756d2071756f642e3c2f6469763e0d0a202020202020202020202020202020202020203c64697620207374796c653d226d696e2d6865696768743a2032303070783b666f6e742d7765696768743a20626f6c643b6d617267696e2d746f703a20323570782220636c6173733d22636f6e7461696e657220636f6c2d6d642d34223e204c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e20457865726369746174696f6e656d207365717569206469676e697373696d6f732076656e69616d20696c6c6f206d696e757320636f6e736571756174757220667567696174206e656d6f206576656e69657420646f6c6f72652074656d706f726120736f6c757461206975726520736564206e6f6269732073617069656e74652c2070726f766964656e742065756d2073696d696c69717565206163637573616e7469756d2071756f642e3c2f6469763e0d0a090909202020203c2f6469763e0d0a090909202020203c70207374796c653d22746578742d616c69676e3a2063656e7465723b666f6e742d7765696768743a20626f6c64223e094c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e204d6178696d65206f7074696f20646f6c6f7265206e616d2c20697573746f20646f6c6f72696275732074656e65747572207175616d206d696e75732071756f642071756173692073657175692065742076656c207265696369656e646973206d696e696d612c20706f7373696d757320666163696c6973206162206c61626f72696f73616d206e65717565206d6f6c6573746961652c20696c6c6f206578636570747572692073696d696c6971756520657865726369746174696f6e656d20756e646520717569206576656e69657420656e696d2e204e6f6269732c20717561657261742c206d6f6c6573746961653f20416c6971756964206578706c696361626f2c20646f6c6f7265732071756962757364616d20697073612070726f766964656e74206e6563657373697461746962757320636f6d6d6f6469206f64696f206173706572696f7265732061207175616d20636f6e7365717561747572206f646974206e6571756520646f6c6f7265206e61747573212053617069656e74652c20646f6c6f726520656e696d20696e636964756e742c206e6f6e2074656d706f7265206569757320636f6e73656374657475722071756964656d206f6d6e6973206e616d206163637573616d7573206e6563657373697461746962757320696e20717569206c61626f72652065786365707475726920657821205574206e6f737472756d2069737465206172636869746563746f20697573746f207365717569206e6f6269732065612061646970697363692c2065756d20636f72706f7269732071756f20756c6c616d206573736520636f6e73657175617475722c20696e76656e746f72652065737420657865726369746174696f6e656d20736f6c7574612073696e742c20697461717565206163637573616e7469756d2e2053696d696c6971756520656c6967656e64692c20717569612069642063756c7061206d6f6c65737469616520666163657265206e616d2076657269746174697320616c69717569642e2051756f64206e617475732c20746f74616d20617420616469706973636920717569737175616d2063756d206f6666696369697320696c6c756d206469676e697373696d6f7320706c616365617420657863657074757269206173706572696f72657320697573746f20706572666572656e646973207265637573616e64616520616e696d6920717569612c20726570756469616e64616520656975732e204661636572652063756d7175652c206e6f626973206e656365737369746174696275732c2074656d706f726120706172696174757220766f6c7570746174652065782065756d2c2073617069656e7465206c61626f72696f73616d20656171756520646f6c6f72206e6f737472756d2c20646f6c6f72756d206d6f64693f20526572756d20657820616c696173206c61626f72696f73616d2c20756e64652071756165726174206576656e6965742073756e7420706f7373696d757320726570756469616e646165206975726520637570696469746174652c206e65717565207361657065206f6666696369612071756962757364616d2071756f642061747175652073697420756c6c616d2e20457373652064697374696e6374696f206f66666963696120766f6c7570746174652c20646f6c6f72696275732076656e69616d2c206e65636573736974617469627573206465626974697320697573746f2074656d706f726520766f6c7570746174657320757420766f6c7570746174756d206c61626f7265206e756d7175616d207665726f20616c697175616d2073656420706c61636561742c206e65736369756e74206163637573616e7469756d2074656d706f726962757320636f6e736571756174757220646f6c6f72656d7175652e204f6666696369697320636f72727570746920766f6c757074617465207365642c2066616365726520656f732073617069656e74652c206e65736369756e742061737065726e6174757220726570756469616e6461652071756920626561746165206120736f6c7574612063756d2071756f6420657865726369746174696f6e656d2c2063756c706120717569737175616d20756c6c616d20756e64652061646970697363692e204465626974697320647563696d75732c206174717565207265637573616e6461652073617069656e746520706172696174757220636f7272757074692c20656172756d206163637573616e7469756d2c2071756f2070726f766964656e74206c696265726f2076656c6974206e65636573736974617469627573206f64697420766f6c75707461746962757320636f6e736571756174757220616c69717569642e20536f6c75746120656e696d2c206e656d6f20656c6967656e6469206d61676e616d2c20706572666572656e64697320696d70656469742e2044697374696e6374696f20646f6c6f726962757320616d65742c2069737465206576656e6965742c20616e696d6920657820706f72726f206172636869746563746f20696e2076656c2c20617373756d656e646120626c616e646974696973206c617564616e7469756d20626561746165207265696369656e64697320696e76656e746f72652e20436f6d6d6f6469206f64697420636f6e7365717561747572207061726961747572207265696369656e646973207175616d2070726f766964656e7420696e76656e746f7265206e616d20697374652c206e69736920697073612c206c696265726f2073757363697069742c207365717569206675676120706572666572656e6469732e204d696e75732071756165726174206e697369206e756d7175616d206e65736369756e742061622c20696e636964756e74206f64697420646f6c6f72656d717565207265696369656e6469732071756173206172636869746563746f207375736369706974206e65717565206f7074696f206578706c696361626f20696421204e6571756520657420766f6c757074617469627573206973746520766f6c75707461746520667567696174206c61626f72756d20656172756d20667567612e2054656e6574757220657863657074757269206f64696f2c2068696320612e3c2f703e0d0a0909093c2f6469763e),
(1, 1, 0x3c696672616d652077696474683d2236343022206865696768743d2233363022207372633d2268747470733a2f2f7777772e796f75747562652e636f6d2f656d6265642f654677666c39356776384922206672616d65626f726465723d22302220616c6c6f7766756c6c73637265656e3e3c2f696672616d653e),
(2, 2, 0x3c6469763e0d0a090909093c6833207374796c653d22746578742d616c69676e3a2063656e7465723b6d617267696e2d746f703a31357078223e47756c6c2054657374696e6720506167653c2f68333e0d0a0909090d0a090909202020203c70207374796c653d22746578742d616c69676e3a2063656e7465723b666f6e742d7765696768743a20626f6c64223e094c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e2051756f20656975732064656c656374757320717561652c2063756d717565206f64696f207265637573616e646165206469676e697373696d6f732120467567697420697073756d2071756964656d20726572756d2071756165726174206e617475732c206d61676e616d206469676e697373696d6f7320646f6c6f72756d20616c6971756964206e697369207175617320616469706973636920696d70656469742074656d706f72652061206465736572756e7420657865726369746174696f6e656d20746f74616d2c2061737065726e6174757220706f7373696d7573206e756d7175616d2063756d206f64697420706f72726f20657373652c20706c616365617420646963746121204d6f64692065737365206e756c6c612c206469676e697373696d6f7320636f6d6d6f6469206e65736369756e74206e616d2066756769742065786365707475726920756e64652c20766572697461746973206c61626f72756d2c20686172756d2063756d7175652e204569757320717561657261742c206578706c696361626f2065756d20726572756d212051756964656d2c207665726f2e20556c6c616d2073617069656e746520726570656c6c61742c206f6d6e6973206265617461652c206675676974206f7074696f2071756173692e205072616573656e7469756d2c206e6563657373697461746962757320697573746f2c20626c616e64697469697320616d6574206e6f6269732c206174206c617564616e7469756d20706c6163656174206f6469742c2070726f766964656e74206d6f6c6573746961652065782e20446f6c6f72657320636f6e73656374657475722071756165726174206970736120646f6c6f72656d717565206675676961742e205175696120686172756d20656c6967656e646920636f6e73657175756e7475722c206465626974697320637570696469746174652071756173206970736120766f6c757074617320736f6c75746120646f6c6f7265206c696265726f2c20766f6c7570746174756d20736564206c617564616e7469756d20766f6c75707461746573206d6f6c6573746961732e20506572666572656e64697320766f6c757074617465732061747175652c20726572756d206e656d6f2065787065646974612c206265617461652c2070726f766964656e74206d6f6c6573746961732064656c656e6974692c20656c6967656e646920616220617574656d2071756f64206465736572756e74206172636869746563746f2e2045756d20617373756d656e64612073756e74206375706964697461746520646f6c6f72656d20616c697175616d206578636570747572692073696d696c69717565206e6f6e20726174696f6e65206573736520636f6e73656374657475722120526570656c6c61742071756f20726570726568656e64657269742061742e2043757069646974617465207574206e616d2c20646f6c6f72652063756d71756520666163657265207072616573656e7469756d20617574656d20667567697420756e6465206d61676e6920626c616e64697469697320617420646f6c6f72657320697572652076656c20766f6c757074617465733f2051756f20697073616d20697073612c206163637573616d7573206164697069736369206d61676e6920646f6c6f72656d206d696e75732071756962757364616d206e6f6e206375706964697461746520666163696c69732076656e69616d20696e636964756e742e205665726f2069746171756520656f73206d6f64692c207175616d206c61626f72756d2e20536571756920656172756d206170657269616d206d61676e692071756964656d20756c6c616d2069707361206174206c61626f7265206f6469742c2069746171756520646963746120736564206675676961742c2076697461652065697573206d696e757320646f6c6f72207265637573616e6461652c20647563696d75732066756761206172636869746563746f2120517569612076656e69616d20766f6c7570746174656d20656e696d20726570656c6c656e64757320686172756d20766f6c7570746174657320697073756d206d61676e616d2c20646f6c6f72756d2076656c697420626c616e64697469697320646f6c6f72206578706c696361626f206163637573616e7469756d206e617475732c2065612c206578206f7074696f20696e76656e746f72652e2045756d206e61747573207574207065727370696369617469732071756f73206c617564616e7469756d2e20446f6c6f7265732c20706172696174757220656f732e204d6f6c6573746961732c20726570656c6c656e64757320737573636970697420636f727275707469212054656d706f726120646f6c6f72656d206f6666696369697320656e696d20736f6c757461206e656d6f206163637573616d75732065612e2041646970697363692073756e742c20667567612072656d3f20526570756469616e6461652061622073756e742071756920646f6c6f72656d20717569612c2074656d706f7269627573206164207265637573616e64616520756c6c616d206469637461206465626974697320766f6c75707461746962757320646f6c6f72656d717565206c61626f7265206e656d6f20726572756d207369742c206578706c696361626f207072616573656e7469756d3f204469676e697373696d6f73206d61696f726573206975726520756c6c616d2c20696e636964756e742c2064656c656e69746920697573746f20646562697469732c20717569737175616d206465736572756e7420667567696174206e61747573207665726f20696e76656e746f726520616d657420726572756d20646f6c6f72756d206c696265726f206d696e696d61206e6f62697320617373756d656e6461206c61626f726520736f6c7574613f2053697420647563696d7573206d61676e6920726570726568656e646572697420646f6c6f7265732071756962757364616d2071756964656d20706f7373696d757320717561652c206f6d6e69732070726f766964656e74206d61676e616d206970736120656f7320736f6c75746120686172756d2c2065697573206e6f6e20726570656c6c61742063757069646974617465206175742073696e7420726570756469616e6461652065742c20706c61636561742061206d696e757321204573736520636f6e7365717561747572206173706572696f7265732c206578706564697461206561206170657269616d20706c616365617420706f72726f206d6f6c6c697469612071756f207669746165206e756d7175616d2c20656172756d20766572697461746973206e6174757320706572737069636961746973206d696e696d612065786365707475726920736f6c75746120647563696d7573206f64696f206e6f737472756d20726570656c6c656e6475732063756d7175652061642065756d206e6571756520766f6c7570746174696275732e20506572666572656e6469732c206869633f205175616d20766f6c7570746174656d207265696369656e6469732073656420636f6e736571756174757220646f6c6f722c20656c6967656e6469206f66666963696973206c617564616e7469756d206f6d6e6973206120726174696f6e6520656f7320736f6c7574612c2073696d696c69717565206f6666696369612064697374696e6374696f20696e636964756e742e205265637573616e6461652c20646f6c6f7265206e61747573206f7074696f2c20616e696d69206d61696f72657320726570656c6c6174206d6f6c6573746961732074656d706f726520766f6c7570746174656d2073617069656e74652c2076656e69616d2064656c65637475732063756d2e20416e696d69206172636869746563746f2c206e697369206e6571756520626c616e6469746969732c2065612061646970697363692074656d706f726120697374652063756d2070726f766964656e74206d696e757320706f7373696d75732e20496e76656e746f7265206576656e6965742071756962757364616d20726570756469616e646165206f7074696f206e656365737369746174696275732071756165726174206469676e697373696d6f732e205665726f206f66666963696973206d696e696d61206163637573616d7573206e656365737369746174696275732063756c70612e2045697573207265696369656e6469732064656c656374757320686172756d2c20736571756920697073612073757363697069742c20756c6c616d206975726520666163696c697320726174696f6e652e2044697374696e6374696f2061642c2065756d206576656e696574206572726f722c20766f6c75707461746962757320616d657420656c6967656e6469206c617564616e7469756d2c2069642071756f7320697073756d2074656d706f72696275732120486172756d20636f72706f72697320706f7373696d7573206e6174757320746f74616d2c20657820726570726568656e646572697420706572666572656e64697320656f73207365642c2065612074656d706f726962757320617373756d656e646120646f6c6f7265732066756769742c20697073756d20706f72726f206163637573616e7469756d206465736572756e742c206d6f6c65737469616520686963206573743f20526570656c6c6174206f6d6e697320766f6c7570746174656d2071756920717569732c206561717565206c61626f726520766f6c757074617469627573206d6178696d6520717561652073756e742c2064656269746973206e756c6c61206469676e697373696d6f7320667567612073656420646f6c6f726573206f64696f2066616365726520706c616365617420646f6c6f722e20446562697469732c2065756d2e204d6f6c657374696173207175617320697073756d207072616573656e7469756d2072656d20657420737573636970697420766f6c7570746174656d2074656d706f7269627573206e656d6f206d61676e616d20656f7320696c6c6f206163637573616e7469756d2c20646f6c6f72652076656e69616d2070726f766964656e74206172636869746563746f20646f6c6f72656d71756520697073612c20756e6465206e6563657373697461746962757320616c6971756964206d6f6c6573746961652e20517569206c61626f72696f73616d2c20636f72706f7269732e3c2f703e0d0a0909093c2f6469763e),
(3, 3, 0x3c68313e54657374206d656e753c2f68313e),
(4, 4, 0x617364);


-- --------------------------------------------------------

--
-- Структура таблицы `FooterButons`
--

CREATE TABLE `FooterButons` (
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `FooterButons`
--

INSERT INTO `FooterButons` (`img`, `link`) VALUES
('image/socialImages/vk.png', 'https://vk.com'),
('image/socialImages/facebook.png', 'https://www.facebook.com'),
('image/socialImages/twiter.png', 'https://twitter.com');

-- --------------------------------------------------------

--
-- Структура таблицы `MenuButtons`
--

CREATE TABLE `MenuButtons` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `LINK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `MenuButtons`
--

INSERT INTO `MenuButtons` (`ID`, `NAME`, `LINK`) VALUES
(0, 'Home', '?id=Home'),
(1, 'Video', '?id=Video'),
(2, 'Loream', '?id=Loream'),
(3, 'Test menu', '?id=Test menu'),
(4, 'asd', '?id=asd');


--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Content`
--
ALTER TABLE `Content`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MENU_ID` (`MENU_ID`);

--
-- Индексы таблицы `MenuButtons`
--
ALTER TABLE `MenuButtons`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NAME` (`NAME`),
  ADD UNIQUE KEY `LINK` (`LINK`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Content`
--
ALTER TABLE `Content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`MENU_ID`) REFERENCES `MenuButtons` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
