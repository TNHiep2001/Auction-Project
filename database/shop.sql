-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 04:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `ItemID` int(10) NOT NULL,
  `BidderID` int(10) NOT NULL,
  `BidAmount` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`ItemID`, `BidderID`, `BidAmount`) VALUES
(70, 9, 2700000),
(51, 9, 860000),
(70, 10, 3000000),
(59, 10, 33500000),
(40, 10, 57500000),
(63, 10, 33000000),
(63, 10, 36000000),
(63, 10, 36000000),
(70, 9, 3000000),
(75, 10, 16000000),
(76, 10, 2000000),
(29, 9, 14000000),
(80, 10, 2400000),
(87, 10, 13000000),
(88, 10, 13000000),
(88, 10, 19000000),
(89, 10, 15000000),
(90, 10, 18000000),
(91, 10, 15000000),
(91, 10, 18000000),
(92, 10, 18000000),
(92, 10, 19000000),
(93, 10, 13000000),
(93, 10, 14000000),
(93, 10, 15000000),
(93, 10, 15500000),
(93, 10, 16000000),
(93, 10, 17000000),
(93, 10, 17300000),
(93, 10, 18000000),
(93, 10, 18500000),
(93, 10, 19000000),
(94, 10, 13000000),
(94, 10, 14000000),
(94, 10, 14500000),
(94, 10, 15000000),
(94, 10, 18000000),
(94, 10, 19000000),
(94, 10, 19500000),
(95, 10, 13000000),
(95, 10, 20000000),
(98, 10, 13000000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `Category` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Category`) VALUES
(1, 'Thiết bị điện tử'),
(2, 'Đồng hồ'),
(3, 'Điện thoại'),
(4, 'Thời trang'),
(5, 'Quần áo'),
(6, 'Giày'),
(7, 'Phòng bếp');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemID` int(10) NOT NULL,
  `ItemName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `SellerID` int(10) DEFAULT NULL,
  `StartingPrice` int(6) NOT NULL,
  `ExpectedPrice` int(6) NOT NULL,
  `CurrentPrice` int(6) DEFAULT NULL,
  `PhotosID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(6000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CategoryID` int(10) NOT NULL,
  `EndTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemID`, `ItemName`, `SellerID`, `StartingPrice`, `ExpectedPrice`, `CurrentPrice`, `PhotosID`, `Description`, `CategoryID`, `EndTime`) VALUES
(29, 'Apple iPad 2 16GB', NULL, 12000000, 16000000, 14000000, 'img/phone1.jpg', 'Apple iPad 2 16GB, Wi-Fi, 9,7 inch - Đen\r\n\r\nSự miêu tả\r\n\r\nIpad này ở trong tình trạng tốt\r\nIPad được kiểm tra đầy đủ và hoạt động hoàn hảo. Pin vẫn đang sạc.\r\nSẽ cho thấy một số vết xước nhỏ, ding hoặc vết lõm nhưng không có gì lớn. Chúng tôi sẽ cho nó 7-8 trên 10\r\nIpad không có trong gói bán lẻ ban đầu. Nó được đóng gói lại trong hộp riêng của chúng tôi.\r\nNó đi kèm với Cáp và Bộ chuyển đổi Tường được Chứng nhận của Apple (Thương hiệu có thể là Apple, Belkin hoặc Rocket-Fish)\r\nĐây là mô hình Wifi. Không cần thẻ Sim.\r\nHướng dẫn sử dụng không được bao gồm và có thể được tải xuống từ trang web của Apple\r\nChúng tôi cung cấp bảo hành 60 ngày\r\n\r\nNhững gì có trong gói?\r\n\r\nApple iPad 2 16GB, Wi-Fi, 9,7 inch - Đen\r\nBộ sạc / Bộ chuyển đổi trên tường được Apple chứng nhận\r\nCáp đồng bộ / dữ liệu được chứng nhận của Apple', 3, '0000-00-00 00:00:00'),
(30, 'Điện thoại thông minh Samsung Galaxy S4 i545 4G LT', NULL, 2150000, 2300000, 2150000, 'img/phone3.jpg', 'Các tính năng nổi bật:\r\n\r\nMàn hình cảm ứng đa điểm điện dung 5 inch Super AMOLED với kính cường lực bảo vệ Corning Gorilla Glass 3\r\n\r\nBộ xử lý Krait 300 lõi tứ 1,9 GHz, Chipset: Qualcomm APQ864T Snapdragon 6, Đồ họa Adreno 320\r\n\r\nMáy ảnh 13 Megapixel (4128 x 3096 pixel) w / Tự động lấy nét, đèn flash LED + Mặt trước 2', 3, '2021-11-09 14:38:00'),
(31, 'Samsung Galaxy S4 MINI i257 ', NULL, 18000000, 21600000, 18000000, 'img/phone4.jpg', '“Điện thoại di động này là MỚI Trong tình trạng khác, có nghĩa là không có hộp bán lẻ vì nó được nhận với số lượng lớn. Về mặt thẩm mỹ, điện thoại di động ở tình trạng hoàn hảo hoặc gần như hoàn hảo, Màn hình hoàn hảo, có thể có một chút vết xước nhỏ có thể nhìn thấy hoặc không nhìn thấy trên vỏ sau khi vận chuyển, v.v., Điện thoại di động được kiểm tra hoạt động tốt. Điện thoại di động được MỞ KHÓA và sẵn sàng cho tất cả các nhà cung cấp dịch vụ GSM như AT&T, T-Mobile Straight Talk, MetroPCS, v.v. trên thế giới. Nó không hoạt động với bất kỳ nhà cung cấp dịch vụ CDMA nào như Verizon, Sprint, Boost Mobile. Vui lòng liên hệ với chúng tôi nếu có bất kỳ câu hỏi nào. ”', 3, '2021-11-09 20:40:00'),
(32, 'Apple Iphone 6 Grigio 64Gb', NULL, 5900000, 6390000, 5900000, 'img/phone5.jpg', '“\r\nApple Iphone 6 Grigio 64Gb in buono stato, con custodia e pellicole apply….\r\n\r\nĐiện thoại di động này ở dạng MỚI Tình trạng khác, nghĩa là không có hộp bán lẻ vì nó được nhận với số lượng lớn. Về mặt thẩm mỹ, điện thoại di động ở tình trạng hoàn hảo hoặc gần như hoàn hảo, Màn hình hoàn hảo, có thể có một chút vết xước nhỏ có thể nhìn thấy hoặc không nhìn thấy trên vỏ sau khi vận chuyển, v.v., Điện thoại di động được kiểm tra hoạt động tốt. Điện thoại di động được MỞ KHÓA và sẵn sàng cho tất cả các nhà cung cấp dịch vụ GSM như AT&T, T-Mobile Straight Talk, MetroPCS, v.v. trên thế giới. Nó không hoạt động với bất kỳ nhà cung cấp dịch vụ CDMA nào như Verizon, Sprint, Boost Mobile. Vui lòng liên hệ với chúng tôi nếu có bất kỳ câu hỏi nào. ”', 3, '2021-11-09 22:50:00'),
(33, 'UTStarcom CDM7126 - Đen bạc', NULL, 15000000, 18200000, 15000000, 'img/phone6.jpg', 'Thông tin sản phẩm\r\nKiểu dáng đẹp, nhỏ gọn và mạnh mẽ, điện thoại di động Cricket UTStarcom CDM7126 màu bạc và đen là sự lựa chọn tuyệt vời cho những người dùng tìm kiếm độ tin cậy và hiệu suất. Điện thoại di động UTStarcom này có màn hình màu tuyệt đẹp, thiết kế kiểu nắp gập, hỗ trợ ba băng tần và pin Li-ion với thời gian thoại lên đến 311 phút và thời gian chờ lên đến 248 giờ. Lướt web nhanh chóng, kết nối nhiều thiết bị thông qua công nghệ Bluetooth và tận hưởng tải mọi thứ từ nhạc chuông đến trò chơi cho đến ứng dụng qua điện thoại di động này. Người dùng sẽ được giải trí hàng giờ với các trò chơi và ứng dụng Cricket có trên điện thoại di động UTStarcom này. Chức năng loa ngoài, quay số kích hoạt bằng giọng nói và nhập văn bản tiên đoán đều giúp giao tiếp dễ dàng hơn, trong khi các ứng dụng máy tính, báo thức và lịch giúp người dùng giữ đúng lịch trình và làm việc hiệu quả. Điện thoại di động UTStarcom CDM7126 giữ các số liên lạc được sắp xếp trong một danh bạ dễ truy cập. Với trọng lượng chỉ 3 oz và cao 3,6 inch, rộng 1,9 inch và sâu 0,7 inch, điện thoại di động UTStarcom này dễ dàng nhét vào túi, ví và cặp.', 3, '2021-11-05 18:45:00'),
(34, 'Ulefone Paris X Android 5.1', NULL, 13000000, 19200000, 13000000, 'img/phone7.jpg', 'Đặc trưng:\r\n \r\nAndroid 5.1 (Lollipop) với bộ xử lý Quad-Core 1.0GHz MT6735P và RAM 2GB + ROM 16GB\r\nHỗ trợ mạng 2G: GSM 850/900/1800/1900 MHz\r\nHỗ trợ mạng 3G: WCDMA 900/2100 MHz\r\nHỗ trợ mạng 4G: FDD-LTE Band 1/3/7/20 (2100/1800/2600 / 800MHz)\r\nhai sim hai sóng\r\nMàn hình điện dung IPS 10 điểm cảm ứng 5,0 inch, với độ phân giải màn hình HD 1280 * 720\r\nCamera sau 8.0MP (nội suy 13.0MP) với đèn pin và lấy nét tự động.\r\nCamera trước 5.0 MP (nội suy 8.0MP), làm cho những bức ảnh selfie của bạn trở nên đặc biệt hơn\r\nUltra Experience - Cập nhật không dây. Được cài đặt sẵn Android 5.1 O.S. Lollipop, tải xuống nhiều ứng dụng trên Cửa hàng Play phổ biến. Hỗ trợ cập nhật hệ thống không dây, giải pháp một cửa, không đau khi sử dụng Ulefone ParisX của bạn.\r\nHỗ trợ hầu hết các trò chơi và ứng dụng Android định dạng APK.', 3, '2021-10-04 00:00:00'),
(35, 'Tông đơ điện Makita N3701 6mm (1/4 ', NULL, 560000, 840000, 840000, 'img/elec1.jpg', 'Thông tin chi tiết sản phẩm\r\n\r\nSố mô hình: N3701\r\nLoại sản phẩm: 1/4 \"Tông đơ\r\nCông suất đầu vào: 440W\r\nTrọng lượng: 1,7kg\r\nTốc độ không tải: 30.000 vòng / phút\r\nDây cấp nguồn: 2,5m\r\nCơ sở: 82 x 90mm\r\nChiều dài tổng thể: 220mm\r\nKích thước Collet: 6mm (1/4 \")\r\nĐiện áp: 220V (Loại có dây / phích cắm C)\r\nVui lòng kiểm tra xem điện áp ghi trên mục có tương ứng với điện áp chính trong nhà bạn không.', 1, '2022-05-25 23:52:00'),
(36, 'Tông đơ DeWALT DWE 6000 1/4 ', NULL, 210000, 290000, 210000, 'img/elec2.jpg', 'MỚI DeWALT DWE 6000 1/4 \"(6mm) Công cụ tông đơ (AC 220V) Đồ gỗ\r\n(Không bao gồm bit)\r\n\r\n■ Thông số kỹ thuật\r\n▶ Loại sản phẩm: 1/4 \"Tông đơ\r\n▶ Điện áp: 220V 390W (Loại phích cắm C)\r\n▶ Công suất Collet: 6mm (1/4 \")\r\n▶ Trọng lượng: 2.1kg\r\n▶ Tốc độ không tải: 30.000 vòng / phút\r\n▶ Kích thước Dài: 110mm x Cao: 205mm\r\n▶ Loại phích cắm: Loại C\r\n', 1, '2021-11-10 20:40:00'),
(37, 'Rockwell HD Block Planer Mẫu 167', NULL, 2100000, 2900000, 2100000, 'img/elec3.jpg', ' Chúng tôi luôn cố gắng cung cấp dịch vụ tốt nhất và sản phẩm chất lượng cao cho mọi khách hàng và mục tiêu của chúng tôi là đảm bảo bạn có trải nghiệm mua sắm thú vị với chúng tôi. Nếu có bất kỳ vấn đề, sự cố hoặc trải nghiệm khó chịu nào, vui lòng liên hệ với chúng tôi để giải quyết bất kỳ vấn đề nào trước khi để lại cho chúng tôi phản hồi tiêu cực hoặc mở bất kỳ tranh chấp nào trên eBay hoặc PayPal. Chúng tôi hứa sẽ cố gắng hết sức để giải quyết vấn đề và thường đó là những gì chúng tôi làm. Hãy cho chúng tôi cơ hội để giải quyết mọi vấn đề vì giao tiếp tốt luôn là cách tốt nhất để giải quyết mọi vấn đề. Nếu bạn hài lòng với dịch vụ của chúng tôi, xin vui lòng để lại cho chúng tôi 5 sao phản hồi tích cực. Ý kiến ​​của bạn và sự công nhận của bạn sẽ khiến chúng tôi tự tin hơn để phát triển doanh nghiệp tốt hơn và phục vụ bạn tốt hơn. Chúng tôi sẽ để lại một phản hồi tích cực sau khi nhận được thanh toán đầy đủ. Tất cả các tin nhắn, email hoặc câu hỏi sẽ được trả lời trong vòng 1 ngày làm việc. Nếu bạn không nhận được phản hồi của chúng tôi, vui lòng gửi lại email của bạn và chúng tôi sẽ trả lời bạn trong thời gian sớm nhất. Chúng tôi chỉ chấp nhận thanh toán qua PayPal. Vì vậy, vui lòng kiểm tra xem bạn có tài khoản PayPal hay không trước khi mua. Chúng tôi cung cấp chính sách hoàn lại tiền trong 30 ngày đảm bảo hoàn trả. Vận chuyển & Hoàn tiền', 1, '2021-11-09 18:45:00'),
(38, 'MÁY NHIỆT KỸ THUẬT SỐ HỒNG NGOẠI LASER', NULL, 3400000, 4200000, 3400000, 'img/elec4.jpg', 'Chúng tôi luôn cố gắng cung cấp dịch vụ tốt nhất và sản phẩm chất lượng cao cho mọi khách hàng và mục tiêu của chúng tôi là đảm bảo bạn có trải nghiệm mua sắm thú vị với chúng tôi. Nếu có bất kỳ vấn đề, sự cố hoặc trải nghiệm khó chịu nào, vui lòng liên hệ với chúng tôi để giải quyết bất kỳ vấn đề nào trước khi để lại cho chúng tôi phản hồi tiêu cực hoặc mở bất kỳ tranh chấp nào trên eBay hoặc PayPal. Chúng tôi hứa sẽ cố gắng hết sức để giải quyết vấn đề và thường đó là những gì chúng tôi làm. Hãy cho chúng tôi cơ hội để giải quyết mọi vấn đề vì giao tiếp tốt luôn là cách tốt nhất để giải quyết mọi vấn đề. Nếu bạn hài lòng với dịch vụ của chúng tôi, xin vui lòng để lại cho chúng tôi 5 sao phản hồi tích cực. Ý kiến ​​của bạn và sự công nhận của bạn sẽ khiến chúng tôi tự tin hơn để phát triển doanh nghiệp tốt hơn và phục vụ bạn tốt hơn. Chúng tôi sẽ để lại một phản hồi tích cực sau khi nhận được thanh toán đầy đủ. Tất cả các tin nhắn, email hoặc câu hỏi sẽ được trả lời trong vòng 1 ngày làm việc. Nếu bạn không nhận được phản hồi của chúng tôi, vui lòng gửi lại email của bạn và chúng tôi sẽ trả lời bạn trong thời gian sớm nhất. Chúng tôi chỉ chấp nhận thanh toán qua PayPal. Vì vậy, vui lòng kiểm tra xem bạn có tài khoản PayPal hay không trước khi mua. Chúng tôi cung cấp chính sách hoàn lại tiền trong 30 ngày đảm bảo hoàn trả. Vận chuyển & Hoàn tiền', 1, '2021-11-08 20:45:00'),
(39, 'Đèn pin Makita ML 100 10.8V ML100', NULL, 4100000, 5100000, 4100000, 'img/elec5.jpg', ' Chúng tôi luôn cố gắng cung cấp dịch vụ tốt nhất và sản phẩm chất lượng cao cho mọi khách hàng và mục tiêu của chúng tôi là đảm bảo bạn có trải nghiệm mua sắm thú vị với chúng tôi. Nếu có bất kỳ vấn đề, sự cố hoặc trải nghiệm khó chịu nào, vui lòng liên hệ với chúng tôi để giải quyết bất kỳ vấn đề nào trước khi để lại cho chúng tôi phản hồi tiêu cực hoặc mở bất kỳ tranh chấp nào trên eBay hoặc PayPal. Chúng tôi hứa sẽ cố gắng hết sức để giải quyết vấn đề và thường đó là những gì chúng tôi làm. Hãy cho chúng tôi cơ hội để giải quyết mọi vấn đề vì giao tiếp tốt luôn là cách tốt nhất để giải quyết mọi vấn đề. Nếu bạn hài lòng với dịch vụ của chúng tôi, xin vui lòng để lại cho chúng tôi 5 sao phản hồi tích cực. Ý kiến ​​của bạn và sự công nhận của bạn sẽ khiến chúng tôi tự tin hơn để phát triển doanh nghiệp tốt hơn và phục vụ bạn tốt hơn. Chúng tôi sẽ để lại một phản hồi tích cực sau khi nhận được thanh toán đầy đủ. Tất cả các tin nhắn, email hoặc câu hỏi sẽ được trả lời trong vòng 1 ngày làm việc. Nếu bạn không nhận được phản hồi của chúng tôi, vui lòng gửi lại email của bạn và chúng tôi sẽ trả lời bạn trong thời gian sớm nhất. Chúng tôi chỉ chấp nhận thanh toán qua PayPal. Vì vậy, vui lòng kiểm tra xem bạn có tài khoản PayPal hay không trước khi mua. Chúng tôi cung cấp chính sách hoàn lại tiền trong 30 ngày đảm bảo hoàn trả. Vận chuyển & Hoàn tiền', 1, '2021-11-09 17:45:00'),
(40, 'MÁY PHÁT ĐIỆN INVERTER MONO STAR MIG', NULL, 56800000, 63000000, 57500000, 'img/elec6.jpg', ' Chúng tôi luôn cố gắng cung cấp dịch vụ tốt nhất và sản phẩm chất lượng cao cho mọi khách hàng và mục tiêu của chúng tôi là đảm bảo bạn có trải nghiệm mua sắm thú vị với chúng tôi. Nếu có bất kỳ vấn đề, sự cố hoặc trải nghiệm khó chịu nào, vui lòng liên hệ với chúng tôi để giải quyết bất kỳ vấn đề nào trước khi để lại cho chúng tôi phản hồi tiêu cực hoặc mở bất kỳ tranh chấp nào trên eBay hoặc PayPal. Chúng tôi hứa sẽ cố gắng hết sức để giải quyết vấn đề và thường đó là những gì chúng tôi làm. Hãy cho chúng tôi cơ hội để giải quyết mọi vấn đề vì giao tiếp tốt luôn là cách tốt nhất để giải quyết mọi vấn đề. Nếu bạn hài lòng với dịch vụ của chúng tôi, xin vui lòng để lại cho chúng tôi 5 sao phản hồi tích cực. Ý kiến ​​của bạn và sự công nhận của bạn sẽ khiến chúng tôi tự tin hơn để phát triển doanh nghiệp tốt hơn và phục vụ bạn tốt hơn. Chúng tôi sẽ để lại một phản hồi tích cực sau khi nhận được thanh toán đầy đủ. Tất cả các tin nhắn, email hoặc câu hỏi sẽ được trả lời trong vòng 1 ngày làm việc. Nếu bạn không nhận được phản hồi của chúng tôi, vui lòng gửi lại email của bạn và chúng tôi sẽ trả lời bạn trong thời gian sớm nhất. Chúng tôi chỉ chấp nhận thanh toán qua PayPal. Vì vậy, vui lòng kiểm tra xem bạn có tài khoản PayPal hay không trước khi mua. Chúng tôi cung cấp 30 days money back guarantee return policy. Shipping & Refund', 1, '2021-11-15 22:40:00'),
(41, 'Áo phông bản giới hạn', NULL, 1200000, 1600000, 1200000, 'img/cl1.jpg', 'Áo phông Huấn luyện / Nhân quả đích thực dành cho nam giới\r\nĐược trang bị chất liệu cotton Blend Lycra\r\n\r\n\r\n\r\n\r\n        Sự miêu tả\r\nLàm từ 90% cotton 10 & Elestine\r\nMáy giặt được\r\nVật liệu trang bị\r\nCó sẵn trong S, M, L, XL, Kích thước\r\nLý tưởng cho đào tạo hoặc mặc thường ngày\r\nBạn chống lại chính mình Logo lớn\r\nDanimal Mang biểu trưng ở bên và sau\r\nĐược sử dụng bởi các nhà xây dựng cơ thể chuyên nghiệp hàng đầu ở Vương quốc Anh\r\nChuyển phát nhanh', 5, '2021-11-06 16:50:00'),
(42, 'Áo sơ mi caro bản giới hạn', NULL, 1200000, 1600000, 1200000, 'img/cl2.jpg', 'Áo phông Huấn luyện / Nhân quả đích thực dành cho nam giới\r\nĐược trang bị chất liệu cotton Blend Lycra\r\n\r\n\r\n\r\n\r\n        Sự miêu tả\r\nLàm từ 90% cotton 10 & Elestine\r\nMáy giặt được\r\nVật liệu trang bị\r\nCó sẵn trong S, M, L, XL, Kích thước\r\nLý tưởng cho đào tạo hoặc mặc thường ngày\r\nBạn chống lại chính mình Logo lớn\r\nDanimal Mang biểu trưng ở bên và sau\r\nĐược sử dụng bởi các nhà xây dựng cơ thể chuyên nghiệp hàng đầu ở Vương quốc Anh\r\nChuyển phát nhanh', 5, '2021-11-06 08:45:00'),
(43, 'Áo thu đông bản sự kiện', NULL, 2400000, 3100000, 2400000, 'img/cl4.jpg', 'Áo đấu phong cách khúc côn cầu của KISS\r\n\r\nMục là từ năm 1997 nhưng chưa bao giờ mặc và trong tình trạng tuyệt vời! Đến từ một gia đình không khói thuốc.\r\n\r\nJersey được dán nhãn một kích cỡ phù hợp với tất cả trên thẻ.\r\n\r\nNếu bạn có bất kì câu hỏi nào, xin vui lòng hỏi!', 5, '2021-11-10 10:50:00'),
(44, 'Áo phông sự kiện hòa nhạc', NULL, 900000, 1500000, 900000, 'img/cl5.jpg', 'KISS Psycho Circus Larger Than Life Mexico 1999 Concert All Over Art T-Shirt XLarge với số đo vòng ngực 44 \"(từ nách đến nách sau đó gấp đôi) và chiều dài từ cổ áo đến viền là 30\". Mang và Rửa sạch từ nhà không khói thuốc miễn phí vật nuôi. Không có lỗ hoặc vết bẩn.', 5, '2021-11-09 05:50:00'),
(45, 'Quần tây nâu size 152 cho bé trai', NULL, 900000, 1500000, 900000, 'img/cl6.jpg', 'KISS Psycho Circus Larger Than Life Mexico 1999 Concert All Over Art T-Shirt XLarge với số đo vòng ngực 44 \"(từ nách đến nách sau đó gấp đôi) và chiều dài từ cổ áo đến viền là 30\". Mang và Rửa sạch từ nhà không khói thuốc vật nuôi miễn phí. Không có lỗ hoặc vết bẩn.', 5, '2021-11-08 22:50:00'),
(47, 'Mặt dây chuyền trang sức thời trang bằng đồng', NULL, 500000, 750000, 500000, 'img/fs1.jpg', 'Nếu bạn nhận được sản phẩm bị lỗi hoặc chúng tôi gửi cho bạn sản phẩm sai, hoặc mặt hàng không như mô tả,\r\n  hoặc mặt hàng bị hư hỏng vì vận chuyển quốc tế, đừng lo lắng, xin vui lòng liên hệ với chúng tôi, chúng tôi chấp nhận hoàn lại tiền,\r\n  hoặc đổi hàng. Bất kỳ mặt hàng không nhận được gây ra bởi địa chỉ không hợp lệ đã đăng ký trên PayPal đều không có trong của chúng tôi\r\n  hoàn trả đầy đủ hoặc chính sách thay thế.', 4, '2021-11-09 19:45:00'),
(48, 'Bạc Phụ nữ Pha lê Rhinestone khối', NULL, 500000, 750000, 500000, 'img/fs2.jpg', ' Nếu bạn nhận được sản phẩm bị lỗi hoặc chúng tôi gửi cho bạn sản phẩm sai, hoặc mặt hàng không như mô tả,\r\n  hoặc mặt hàng bị hư hỏng vì vận chuyển quốc tế, đừng lo lắng, xin vui lòng liên hệ với chúng tôi, chúng tôi chấp nhận hoàn lại tiền,\r\n  hoặc đổi hàng. Bất kỳ mặt hàng không nhận được gây ra bởi địa chỉ không hợp lệ đã đăng ký trên PayPal đều không có trong của chúng tôi\r\n  hoàn trả đầy đủ hoặc chính sách thay thế.', 4, '2021-11-09 20:00:00'),
(49, 'Cỏ bốn lá màu xanh lá cây thực sự', NULL, 600000, 1000000, 670000, 'img/fs3.jpg', ' Nếu bạn nhận được sản phẩm bị lỗi hoặc chúng tôi gửi cho bạn sản phẩm sai, hoặc mặt hàng không như mô tả,\r\n  hoặc mặt hàng bị hư hỏng vì vận chuyển quốc tế, đừng lo lắng, xin vui lòng liên hệ với chúng tôi, chúng tôi chấp nhận hoàn lại tiền,\r\n  hoặc đổi hàng. Bất kỳ mặt hàng không nhận được gây ra bởi địa chỉ không hợp lệ đã đăng ký trên PayPal đều không có trong của chúng tôi\r\n  hoàn trả đầy đủ hoặc chính sách thay thế.', 4, '2021-11-09 20:00:00'),
(50, 'Vòng cổ choker mặt dây chuyền giọt nước', NULL, 600000, 1000000, 600000, 'img/fs4.jpg', ' Nếu bạn nhận được sản phẩm bị lỗi hoặc chúng tôi gửi cho bạn sản phẩm sai, hoặc mặt hàng không như mô tả,\r\n  hoặc mặt hàng bị hư hỏng vì vận chuyển quốc tế, đừng lo lắng, xin vui lòng liên hệ với chúng tôi, chúng tôi chấp nhận hoàn lại tiền,\r\n  hoặc đổi hàng. Bất kỳ mặt hàng không nhận được gây ra bởi địa chỉ không hợp lệ đã đăng ký trên PayPal đều không có trong của chúng tôi\r\n  hoàn trả đầy đủ hoặc chính sách thay thế.\r\n', 4, '2021-11-08 20:50:00'),
(51, 'Vòng cổ choker mặt dây chuyền giọt nước', NULL, 600000, 900000, 860000, 'img/fs5.jpg', ' Nếu bạn nhận được sản phẩm bị lỗi hoặc chúng tôi gửi cho bạn sản phẩm sai, hoặc mặt hàng không như mô tả,\r\n  hoặc mặt hàng bị hư hỏng vì vận chuyển quốc tế, đừng lo lắng, xin vui lòng liên hệ với chúng tôi, chúng tôi chấp nhận hoàn lại tiền,\r\n  hoặc đổi hàng. Bất kỳ mặt hàng không nhận được gây ra bởi địa chỉ không hợp lệ đã đăng ký trên PayPal đều không có trong của chúng tôi\r\n  hoàn trả đầy đủ hoặc chính sách thay thế.', 4, '2021-11-09 15:50:00'),
(52, 'Mặt dây chuyền quyến rũ DOLLAR POUCH', NULL, 600000, 900000, 600000, 'img/fs6.jpg', ' Nếu bạn nhận được sản phẩm bị lỗi hoặc chúng tôi gửi cho bạn sản phẩm sai, hoặc mặt hàng không như mô tả,\r\n  hoặc mặt hàng bị hư hỏng vì vận chuyển quốc tế, đừng lo lắng, xin vui lòng liên hệ với chúng tôi, chúng tôi chấp nhận hoàn lại tiền,\r\n  hoặc đổi hàng. Bất kỳ mặt hàng không nhận được gây ra bởi địa chỉ không hợp lệ đã đăng ký trên PayPal đều không có trong của chúng tôi\r\n  hoàn trả đầy đủ hoặc chính sách thay thế.', 4, '2021-11-08 22:10:00'),
(53, 'Bộ lọc vòi Bộ lọc nước Vòi', NULL, 250000, 520000, 250000, 'img/kt1.jpg', 'Đặc trưng:\r\n100% thương hiệu mới, chất lượng cao\r\n\r\nMàu sắc: Ngẫu nhiên\r\n\r\nThông số kỹ thuật:\r\nChất liệu: Sponge\r\n\r\nGói bao gồm:\r\n1 bộ lọc bọt biển X', 7, '2021-11-09 00:50:00'),
(54, 'Máy cắt khoai tây chiên mới lạ Cắt thành từng dải', NULL, 360000, 520000, 412000, 'img/kt2.jpg', 'Đặc trưng:\r\n100% thương hiệu mới, chất lượng cao\r\n\r\nMàu sắc: Ngẫu nhiên\r\n\r\nThông số kỹ thuật:\r\nChất liệu: Sponge\r\n\r\nGói bao gồm:\r\n1 bộ lọc bọt biển X', 7, '2021-11-07 04:50:00'),
(55, 'Bộ đồ dùng đồ dùng nấu ăn trong nhà bếp', NULL, 250000, 360000, 250000, 'img/kt3.jpg', 'SỰ PHÙ HỢP THUẬT NGỮ của một thiết kế cổ điển sẽ mang lại nét sang trọng với chức năng cho ngôi nhà của bạn. Bộ sản phẩm bao gồm Muôi, Muỗng đặc, Nĩa đựng thịt, Dao trộn / Thìa có rãnh và Dụng cụ hớt váng.', 7, '2021-11-06 17:50:00'),
(56, 'Máy gọt khoai tây rau củ quả', NULL, 200000, 390000, 200000, 'img/kt4.jpg', 'Mã số: K3247XX\r\nTình trạng: 100% thương hiệu mới và chất lượng cao\r\nChất liệu: Thép không gỉ + nhựa\r\nMàu sắc: Màu ngẫu nhiên\r\nKích thước: 19,5 * 8 * 5cm / 7,67 * 3,14 * 1,96 inch\r\nGói bao gồm: 1x Máy gọt trái cây rau củ\r\n\r\nĐặc trưng:\r\n(1) Được làm bằng thép không gỉ và nhựa chất lượng cao --- bền\r\n(2) Đây là một máy gọt đa chức năng với các lưỡi có thể xoay 360 độ.\r\n(3) Nó có 3 loại lưỡi dao có thể bào thực phẩm thành các loại hình dạng khác nhau.\r\n(4) Trọng lượng nhẹ, dễ sử dụng và làm sạch', 7, '2021-11-09 05:00:00'),
(59, 'Đồng hồ nam phiên bản sự kiện 10 tuổi rolex', NULL, 25000000, 36000000, 33500000, 'img/wt1.jpg', 'thông số kỹ thuật\r\nThương hiệu: CHENXI\r\nLoại sản phẩm: Đồng hồ đeo tay thạch anh\r\nChất liệu vỏ: Thép không gỉ\r\nLoại vật liệu cửa sổ quay số: Kính\r\nĐộ sâu kháng nước: 3Bar\r\nPhong trào: Quartz\r\nĐường kính quay số: 4 mm', 2, '2022-05-13 03:10:00'),
(60, 'Đồng hồ đeo tay thạch anh', NULL, 23000000, 36000000, 23000000, 'img/wt2.jpg', 'thông số kỹ thuật\r\nThương hiệu: CHENXI\r\nLoại sản phẩm: Đồng hồ đeo tay thạch anh\r\nChất liệu vỏ: Thép không gỉ\r\nLoại vật liệu cửa sổ quay số: Kính\r\nĐộ sâu kháng nước: 3Bar\r\nPhong trào: Quartz\r\nĐường kính quay số: 4 mm', 2, '2022-01-09 22:55:00'),
(61, 'Đồng hồ đeo tay thạch anh cổ điển', NULL, 26000000, 36000000, 26000000, 'img/wt3.jpg', 'thông số kỹ thuật\r\nThương hiệu: CHENXI\r\nLoại sản phẩm: Đồng hồ đeo tay thạch anh\r\nChất liệu vỏ: Thép không gỉ\r\nLoại vật liệu cửa sổ quay số: Kính\r\nĐộ sâu kháng nước: 3Bar\r\nPhong trào: Quartz\r\nĐường kính quay số: 4 mm', 2, '2021-11-09 12:45:00'),
(62, 'Đồng hồ da màu đen thạch anh', NULL, 15000000, 36000000, 15000000, 'img/wt4.jpg', 'thông số kỹ thuật\r\nThương hiệu: CHENXI\r\nLoại sản phẩm: Đồng hồ đeo tay thạch anh\r\nChất liệu vỏ: Thép không gỉ\r\nLoại vật liệu cửa sổ quay số: Kính\r\nĐộ sâu kháng nước: 3Bar\r\nPhong trào: Quartz\r\nĐường kính quay số: 4 mm', 2, '2021-11-10 20:45:00'),
(63, 'Đồng hồ Stainless Steel da', NULL, 31000000, 36000000, 36000000, 'img/wt5.jpg', 'thông số kỹ thuật\r\nThương hiệu: CHENXI\r\nLoại sản phẩm: Đồng hồ đeo tay thạch anh\r\nChất liệu vỏ: Thép không gỉ\r\nLoại vật liệu cửa sổ quay số: Kính\r\nĐộ sâu kháng nước: 3Bar\r\nPhong trào: Quartz\r\nĐường kính quay số: 4 mm', 2, '2021-11-05 00:00:00'),
(64, 'Quà tặng đồng hồ đeo tay bằng da mặt số thạch anh', NULL, 39000000, 45000000, 39000000, 'img/wt6.jpg', 'thông số kỹ thuật\r\nThương hiệu: CHENXI\r\nLoại sản phẩm: Đồng hồ đeo tay thạch anh\r\nChất liệu vỏ: Thép không gỉ\r\nLoại vật liệu cửa sổ quay số: Kính\r\nĐộ sâu kháng nước: 3Bar\r\nPhong trào: Quartz\r\nĐường kính quay số: 4 mm', 2, '2021-11-09 17:45:00'),
(65, 'Giày chạy bộ Nike nam Flyknit Max Air', NULL, 3100000, 3600000, 3100000, 'img/sh1.jpg', 'Giày chạy bộ cao cấp Nike nam Flyknit Max Air mới\r\n\r\n(Mới với Hộp)\r\n\r\nPhong cách # 620469-404\r\n\r\nMàu: Blue / Blck / Concord / Crimson\r\n\r\nKích thước: 11,5 US, 13 US\r\n\r\nGiữ lại ở mức 3600000\r\n\r\n \r\nMUA CHÚNG VỚI GIÁ 3100000\r\n\r\nPHÍ VẬN CHUYỂN / XỬ LÝ ĐƯỢC MIỄN PHÍ QUA CÁC CÔNG DỤNG TẠI MỸ. BỔ SUNG PHÍ VẬN CHUYỂN QUỐC TẾ.\r\n\r\nTÔI SẼ VẬN CHUYỂN NGAY SAU KHI THANH TOÁN ĐƯỢC THỰC HIỆN. TÔI CHẤP NHẬN PAYPAL,', 6, '2021-11-08 20:00:00'),
(66, 'Giày chạy bộ bản giới hạn sự kiện', NULL, 2600000, 3600000, 2600000, 'img/sh2.jpg', 'Giày chạy bộ cao cấp Nike nam Flyknit Max Air mới\r\n\r\n(Mới với Hộp)\r\n\r\nPhong cách # 620469-404\r\n\r\nMàu: Đen / Trắng / Xám\r\n\r\nKích thước: 11,5 US, 13 US\r\n\r\nGiữ lại ở mức 3600000\r\n\r\n \r\nMUA CHÚNG VỚI GIÁ 2600000\r\n\r\nPHÍ VẬN CHUYỂN / XỬ LÝ ĐƯỢC MIỄN PHÍ QUA CÁC CÔNG DỤNG TẠI Việt Nam. BỔ SUNG PHÍ VẬN CHUYỂN QUỐC TẾ.\r\n\r\nTÔI SẼ VẬN CHUYỂN NGAY SAU KHI THANH TOÁN ĐƯỢC THỰC HIỆN. TÔI CHẤP NHẬN PAYPAL,', 6, '2021-11-10 08:00:00'),
(67, 'Giày chạy bộ phiên bản cổ điển', NULL, 2900000, 3600000, 2900000, 'img/sh3.jpg', 'Giày chạy bộ cao cấp Nike nam Flyknit Max Air mới\r\n\r\n(Mới với Hộp)\r\n\r\nPhong cách # 620469-404\r\n\r\nMàu: Xanh\r\n\r\nKích thước: 11,5 US, 13 US\r\n\r\nGiữ lại ở mức 3600000\r\n\r\n \r\nMUA CHÚNG VỚI GIÁ 2900000\r\n\r\nPHÍ VẬN CHUYỂN / XỬ LÝ ĐƯỢC MIỄN PHÍ QUA CÁC CÔNG DỤNG TẠI Việt Nam. BỔ SUNG PHÍ VẬN CHUYỂN QUỐC TẾ.\r\n\r\nTÔI SẼ VẬN CHUYỂN NGAY SAU KHI THANH TOÁN ĐƯỢC THỰC HIỆN. TÔI CHẤP NHẬN PAYPAL,', 6, '2021-11-09 22:50:00'),
(68, 'Boot gia cao cấp giới hạn', NULL, 3700000, 5100000, 3780000, 'img/sh4.jpg', 'Giày chạy bộ cao cấp Nike nam Flyknit Max Air mới\r\n\r\n(Mới với Hộp)\r\n\r\nPhong cách # 620469-404\r\n\r\nMàu: Đen xám\r\n\r\nKích thước: 11,5 US, 13 US\r\n\r\nGiữ lại ở mức 5100000\r\n\r\n \r\nMUA CHÚNG VỚI GIÁ 3780000\r\n\r\nPHÍ VẬN CHUYỂN / XỬ LÝ ĐƯỢC MIỄN PHÍ QUA CÁC CÔNG DỤNG TẠI Việt Nam. BỔ SUNG PHÍ VẬN CHUYỂN QUỐC TẾ.\r\n\r\nTÔI SẼ VẬN CHUYỂN NGAY SAU KHI THANH TOÁN ĐƯỢC THỰC HIỆN. TÔI CHẤP NHẬN PAYPAL,', 6, '2021-11-09 05:50:00'),
(69, 'Giày cao gót show diễn BP', NULL, 2100000, 2600000, 2600000, 'img/sh5.jpg', 'Giày chạy bộ cao cấp Nike nam Flyknit Max Air mới\r\n\r\n(Mới với Hộp)\r\n\r\nPhong cách # 620469-404\r\n\r\nMàu: Màu pha\r\n\r\nKích thước: 11,5 US, 13 US\r\n\r\nGiữ lại ở mức 2600000\r\n\r\n \r\nMUA CHÚNG VỚI GIÁ 2100000\r\n\r\nPHÍ VẬN CHUYỂN / XỬ LÝ ĐƯỢC MIỄN PHÍ QUA CÁC CÔNG DỤNG TẠI Việt Nam. BỔ SUNG PHÍ VẬN CHUYỂN QUỐC TẾ.\r\n\r\nTÔI SẼ VẬN CHUYỂN NGAY SAU KHI THANH TOÁN ĐƯỢC THỰC HIỆN. TÔI CHẤP NHẬN PAYPAL,', 6, '2021-11-06 00:00:00'),
(70, 'Sandal phiên bản sự kiện ', NULL, 1900000, 3000000, 3000000, 'img/sh6.jpg', 'Giày chạy bộ cao cấp Nike nam Flyknit Max Air mới\r\n\r\n(Mới với Hộp)\r\n\r\nPhong cách # 620469-404\r\n\r\nMàu: Vàng / Đen\r\n\r\nKích thước: 11,5 US, 13 US\r\n\r\nGiữ lại ở mức 3000000\r\n\r\n \r\nMUA CHÚNG VỚI GIÁ 1900000\r\n\r\nPHÍ VẬN CHUYỂN / XỬ LÝ ĐƯỢC MIỄN PHÍ QUA CÁC CÔNG DỤNG TẠI Việt Nam. BỔ SUNG PHÍ VẬN CHUYỂN QUỐC TẾ.\r\n\r\nTÔI SẼ VẬN CHUYỂN NGAY SAU KHI THANH TOÁN ĐƯỢC THỰC HIỆN. TÔI CHẤP NHẬN PAYPAL,', 6, '2021-11-06 00:00:00'),
(75, 'Máy ảnh canon 60D', 10, 15000000, 25000000, 16000000, 'img/Item_26432.jpg', 'Canon 60D là dòng máy bán chuyên nhưng lại có khả năng quay phim độ nét cao 1080p. Chiếc máy này có vài tính năng của dòng máy cao cấp Canon EOS 5D Mark II, bao gồm chức năng quay phim, chức năng xem trực tiếp, và công nghệ xử lý ảnh DiGIC 4.Những đoạn phim được thu với định dạng MOV với chuẩn nén video H.264/MPEG-4 và tuyến âm thanh PCM.', 1, '2021-11-07 20:15:00'),
(76, 'oto', 10, 15000000, 2000000, 2000000, 'img/Item_92826.jpg', 'oto dieu khien', 1, '2021-11-06 00:00:00'),
(80, 'Áo phông bản giới hạn 1', 10, 1200000, 4500000, 2400000, 'img/Item_78312.jpg', 'abc', 1, '2022-05-17 09:42:00'),
(87, 'Máy tính dân chơi', 10, 12000000, 20000000, 13000000, 'img/Item_70952.jpg', 'Chúc bạn may mắn', 1, '2022-05-20 15:17:00'),
(88, 'dádqw', 10, 12000000, 20000000, 19000000, 'img/Item_17931.jpg', 'qưdqwdq', 2, '2022-05-23 03:10:00'),
(89, 'Máy tính dân chơi', 10, 12000000, 20000000, 15000000, 'img/Item_3147.jpg', 'adsasd', 1, '2022-05-20 16:14:00'),
(90, 'ĐỒ CHƠI CÔNG NGHỆ', 10, 12000000, 20000000, 18000000, 'img/Item_37916.jpg', 'SẢN PHẨM THỜI ĐẠI', 1, '2022-05-20 16:28:00'),
(91, 'Máy tính dân chơi', 10, 12000000, 20000000, 18000000, 'img/Item_51781.jpg', 'abc', 1, '2022-05-20 16:34:00'),
(92, 'Máy tính dân chơi', 10, 12000000, 20000000, 19000000, 'img/Item_72790.jpg', 'abc', 1, '2022-05-20 16:51:00'),
(93, 'Máy tính dân chơi', 10, 12000000, 20000000, 19000000, 'img/Item_74936.jpg', 'abc', 1, '2022-05-20 16:59:00'),
(94, 'Máy tính dân chơi', 10, 12000000, 20000000, 19500000, 'img/Item_43346.jpg', 'abc', 1, '2022-05-20 17:05:00'),
(95, 'Máy tính dân chơi', 10, 12000000, 20000000, 20000000, 'img/Item_87259.jpg', 'av', 1, '2022-05-20 00:00:00'),
(98, 'abc', NULL, 12000000, 15000000, 13000000, 'img/Item_6118.jpg', 'bnm', 1, '2022-05-23 03:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `solditems`
--

CREATE TABLE `solditems` (
  `InvoiceNumber` int(11) NOT NULL,
  `ItemID` int(10) NOT NULL,
  `BuyerID` int(10) NOT NULL,
  `Date` datetime NOT NULL,
  `FinalValue` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solditems`
--

INSERT INTO `solditems` (`InvoiceNumber`, `ItemID`, `BuyerID`, `Date`, `FinalValue`) VALUES
(1, 63, 10, '2021-11-05 00:00:00', 36000000),
(3, 70, 9, '2021-11-06 00:00:00', 3000000),
(5, 76, 10, '2021-11-06 00:00:00', 2000000),
(6, 75, 10, '2021-11-07 20:15:00', 16000000),
(10, 88, 10, '2022-05-20 15:45:00', 19000000),
(13, 87, 10, '2022-05-20 15:17:00', 13000000),
(14, 89, 10, '2022-05-20 16:14:00', 15000000),
(15, 90, 10, '2022-05-20 16:28:00', 18000000),
(17, 91, 10, '2022-05-20 16:34:00', 18000000),
(19, 93, 10, '2022-05-20 16:59:00', 19000000),
(20, 94, 10, '2022-05-20 17:05:00', 19500000),
(23, 95, 10, '2022-05-20 00:00:00', 20000000),
(28, 80, 10, '2022-05-17 09:42:00', 2400000),
(31, 98, 10, '2022-05-23 03:20:00', 13000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(10) NOT NULL,
  `Username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact_No` int(10) NOT NULL,
  `Address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `FName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `LName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `active` char(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Contact_No`, `Address`, `FName`, `LName`, `status`, `active`, `email`) VALUES
(9, 'admin', '$2y$10$JiJVlGEhfeoWfjW0a.kmMeXNcGdtf5JQ.gjXIvWh2hTYRSXYNH2xG', 843906364, '123', 'Hiep', 'Tran', 2, '449acb870ffacf72f526fc2d9449b3b0', 'Hiep140701@gmail.com'),
(10, 'hiep123', '$2y$10$JiJVlGEhfeoWfjW0a.kmMeXNcGdtf5JQ.gjXIvWh2hTYRSXYNH2xG', 999888888, 'Hung Yen', 'Tran', 'Hiep', 1, '3728a72519d1ca0ae06fe5385f767086', 'hiep140701@gmail.com'),
(13, 'hiepht', '$2y$10$tcsy6roNe75CusOWZwwxWuOD0MvXRAudIWlLeqZMuuzdMYMNWhxKW', 999888889, 'Hung Yen', 'Hiep', 'Tran', 1, '8cfe40d15f2b55d546ed10a19d8b8662', 'hiepbachay693@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD KEY `ItemID` (`ItemID`),
  ADD KEY `BidderID` (`BidderID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `items_ibfk_1` (`CategoryID`),
  ADD KEY `item_ibfk_6` (`SellerID`);

--
-- Indexes for table `solditems`
--
ALTER TABLE `solditems`
  ADD PRIMARY KEY (`InvoiceNumber`),
  ADD KEY `ItemID` (`ItemID`),
  ADD KEY `solditems_ibfk_2` (`BuyerID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ItemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `solditems`
--
ALTER TABLE `solditems`
  MODIFY `InvoiceNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `item` (`ItemID`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`BidderID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_6` FOREIGN KEY (`SellerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `solditems`
--
ALTER TABLE `solditems`
  ADD CONSTRAINT `solditems_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `item` (`ItemID`),
  ADD CONSTRAINT `solditems_ibfk_2` FOREIGN KEY (`BuyerID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
