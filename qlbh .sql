-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2022 lúc 06:04 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`CategoryId`, `CategoryName`) VALUES
(1, 'Nhẫn'),
(2, 'Dây chuyền'),
(3, 'Vòng tay'),
(4, 'Khuyên tai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderId` int(11) NOT NULL,
  `Productid` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`OrderId`, `Productid`, `Quantity`, `Price`) VALUES
(14, 3, 1, '280'),
(15, 3, 1, '280'),
(8, 17, 1, '350'),
(9, 47, 1, '399'),
(10, 38, 1, '450'),
(11, 33, 1, '850'),
(12, 7, 1, '300'),
(14, 22, 1, '1000'),
(16, 41, 1, '399'),
(17, 18, 1, '280'),
(18, 6, 1, '360'),
(19, 2, 12, '3840'),
(19, 3, 3, '280'),
(21, 4, 5, '1500');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Note` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `CreateDate` date NOT NULL,
  `PaymentId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ship` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderId`, `UserId`, `Note`, `CreateDate`, `PaymentId`, `status`, `ship`) VALUES
(8, 2, 'Hàng dễ vỡ', '2022-05-23', 1, 1, 1),
(9, 2, 'Hàng dễ vỡ', '2022-05-23', 1, 1, 1),
(10, 2, 'Hàng dễ vỡ', '2022-05-23', 1, 1, 1),
(11, 2, 'Hàng dễ vỡ', '2022-05-23', 1, 1, 0),
(12, 2, 'Hàng dễ vỡ', '2022-05-23', 1, 1, 0),
(14, 1, 'Hàng dễ vỡ', '2022-05-23', 1, 1, 0),
(15, 1, 'Hàng dễ vỡ', '2022-05-23', 1, 0, 0),
(16, 2, 'Hàng dễ vỡ', '2022-05-23', 1, 1, 0),
(17, 2, 'Hàng dễ vỡ', '2022-05-23', 1, 1, 0),
(18, 2, 'Hàng dễ vỡ', '2022-05-24', 1, 1, 0),
(19, 2, 'Hàng dễ vỡ', '2022-05-24', 1, 1, 0),
(21, 2, 'Hàng dễ vỡ', '2022-05-24', 1, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `PaymentId` int(11) NOT NULL,
  `PaymentName` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`PaymentId`, `PaymentName`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Thanh toán bằng thẻ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ProductImage` varchar(1000) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `Description` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaterialName` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `ProductImage`, `Price`, `Quantity`, `CategoryId`, `Description`, `MaterialName`) VALUES
(1, 'Orion Earrings\r\n', 'https://drive.google.com/file/d/1XuzH3htpdW_thiJvABXxRgDPREMC6acs/view?usp=sharing|https://drive.google.com/file/d/1lWW4TXM-O3S9ON35OSpmbHF_x6rWQ4as/view?usp=sharing', '380', 1000, 1, '\"Khuyên tai màu bạc sáng, với thiết kế vòng tròn đính hạt đá trong suốt khắp thân khuyên. khuyên cài bằng khóa móc phía sau tai.\r\n Phụ kiện được thiết kế sắc sảo và hoàn hảo khi diện cùng trang phục phong cách thanh lịch, cổ điển mỗi ngày.\"\r\n', 'Bông tai'),
(2, 'Lucia Earrings\r\n', 'https://drive.google.com/file/d/1sOIGSxtZ5cF1vOMqrUGBhnwjZjupMxXL/view?usp=sharing|https://drive.google.com/file/d/10C1rfP8E_jy4WdK1RDso_-RTlnT2zThq/view?usp=sharing', '320', 1000, 2, '\"Khuyên tai bằng kim loại, màu bạc sáng, phối hạt đá trong suốt theo hình bầu dục dài. khuyên cài sát tai, chốt bấm và khóa bấm phía đằng sau.\r\n Phụ kiện được thiết kế với kích thước vừa vặn, tinh tế và là lựa chọn hoàn hảo khi kết hợp với mọi trang phục.', 'Bông tai'),
(3, 'Water Drop Earrings\r\n', 'https://drive.google.com/file/d/1ewObHuJcfknrgKrS3pBLW5oLDNUxzeZs/view?usp=sharing|https://drive.google.com/file/d/1NbMsfuVeKuWzx48qkZ8LwQ8-h-F9MPY-/view?usp=sharing', '280', 1000, 2, '\"Set khuyên tai gồm 3 đôi bằng kim loại, kiểu dáng hình giọt nước đính hạt đá sáng, trong suốt.\r\n Phụ kiện được thiết kế tinh tế, có nhiều kiểu đeo và là lựa chọn hoàn hảo cho phong cách nữ tính mỗi ngày.\"\r\n', 'Bông tai'),
(4, 'Stellar Earrings\r\n', 'https://drive.google.com/file/d/1V4c6vEOjWyCPJ27AQFI4ra959fZrbE54/view?usp=sharing|https://drive.google.com/file/d/19v_oCbAMSl5KOx4251hJUiCJzLhzlc9T/view?usp=sharing', '300', 1000, 1, '\"Khuyên tai hình sao đính đá phối hạt trai.\r\n Cài phía đằng sau chốt bấm và khóa bấm.\r\nPhụ kiện được thiết kế cầu kì, tinh tế và là món đồ không thể thiếu cho các quý cô thanh lịch\"\r\n', 'Bông tai'),
(5, 'Vega Earrings\r\n', 'https://drive.google.com/file/d/1JE-AuK9YzL6bTH1t-6_IkE_B5JOE80nP/view?usp=sharing|https://drive.google.com/file/d/1e_oat8Jl5CrljAmloRC1A7gENIngtjzZ/view?usp=sharing', '220', 1000, 2, 'Khuyên tai nhỏ đeo vào xuôi theo tai với thiết kế hạt đá lấp lánh nữ tính và phụ hợp nhiều loại trang phục.\r\n', 'Bông tai'),
(6, 'Evie Earrings\r\n', 'https://drive.google.com/file/d/1reDiR3P8DQgGEDj0aWjpqTmRVIKBcnQ4/view?usp=sharing|https://drive.google.com/file/d/1lfdUdwvjaOdHB0ffpWBegAs0SFPC6GoS/view?usp=sharing', '360', 1000, 2, '\"Khuyên tai bằng kim loại, màu bạc sáng, phối hạt đá trong suốt theo hình chiếc lá 4 cánh. khuyên cài sát tai, chốt bấm và khóa bấm phía đằng sau.\r\n Phụ kiện được thiết kế nhỏ gọn, tinh tế và là lựa chọn hoàn hảo khi kết hợp với mọi trang phục.\"\r\n', 'Bông tai'),
(7, 'Brielle Earrings\r\n', 'https://drive.google.com/file/d/14VR8czpoN5aoUEA5kZFJQdFHiYv-PvOn/view?usp=sharing|https://drive.google.com/file/d/1xYUItj2_3n5jA7gRRlFNuxjtqqURChON/view?usp=sharing', '300', 1000, 1, '\"Khuyên tai đính đá sáng và được gắn hạt ngọc trai làm điểm nhấn với kiểu dáng cách điệu.\r\n Khuyên cài sát tai, chốt bấm và khóa cài phía đằng sau.\r\nPhụ kiện được thiết kế chi tiết, tinh tế và là điểm nhấn hoàn hảo cho phong cách cổ điển, thanh lịch.\"\r\n', 'Bông tai'),
(8, 'Olay Earrings\r\n', 'https://drive.google.com/file/d/1GsdMVY9sBZXIiAujNG5IOolfeszC_iGm/view?usp=sharing|https://drive.google.com/file/d/1gFkbyibCt_nkzX__BRAZ8YAMVVL1rOoo/view?usp=sharing', '320', 1000, 1, '\"Khuyên tai bằng kim loại phối hạt đá sáng khắp thân khuyên, kiểu dáng thiên tròn nhỏ nhắn. khuyên cài sát tai, chốt bấm và khóa bấm phía đằng sau.\r\n Phụ kiện được thiết kế chi tiết, nhẹ nhàng và điểm nhấn tinh tế hàng ngày hòa thiện mọi trang phục\"\r\n', 'Bông tai'),
(17, 'Afia Necklace\r\n', 'https://drive.google.com/file/d/1QdWxBnVMjF9x2iK861XBM-HJin_C9TNs/view?usp=sharing|https://drive.google.com/file/d/13mvUW8ICGI8ZVFaNgjBdPHzj_Q4WeK5C/view?usp=sharing', '350', 1000, 1, '\"Vòng cổ dây dáng xích mảnh, phối mặt dây chuyền Afia với thiết kế ba vòng bạc đính đá lấp lánh đan nhau.\r\n Phụ kiện với kiểu dáng tinh sảo, thanh mảnh điểm xuyết vô cùng tinh tế cho bộ trang phục nữ tính, tối giản mỗi ngày\"\r\n', 'Dây chuyền'),
(18, 'Embrace Choker\r\n', 'https://drive.google.com/file/d/1NDUJ3HJeVDxU7EAnwWyDgNWwatDvEmNV/view?usp=sharing|https://drive.google.com/file/d/1uGUDDOMU12iHxDj6USszYbQARpxUSleW/view?usp=sharing', '280', 1000, 2, '\"Choker bản to, đính hạt đá trong suốt, lấp lánh phủ khắp chiếc vòng\r\nKhóa dạng cài, có thể điều chỉnh kích thước vòng phù hợp\r\nPhụ kiện với kiểu dáng biến tấu, là điểm nhấn hoàn hảo cho phái đẹp trong những dịp trọng đại hay sự kiện yêu cầu lộng lẫy\"\r\n', 'Dây chuyền'),
(19, 'Four Petals Necklace\r\n', 'https://drive.google.com/file/d/12SxIxDZhPIgVYscGkkJ8SHb_fHyWUEpd/view?usp=sharing|https://drive.google.com/file/d/1l9b9xwMNRmU81BWjQCsW8MT9l4nLlZto/view?usp=sharing', '690', 1000, 2, 'Lấy cảm hứng từ sự rạng rỡ của kim cương , chúng tôi sử dụng một sự kết hợp độc đáo của các vết cắt cho một sự nhạy cảm lãng mạn rõ rệt. Sự đơn giản thanh lịch của mặt dây chuyền này làm cho nó phù hợp với ban ngàycũng như cho buổi tối.\r\n', 'Dây chuyền'),
(20, 'Vine Circle Necklace\r\n', 'https://drive.google.com/file/d/11_QlLu8wmkM1QIfLdwJeMhHHLFwh1Kar/view?usp=sharing|https://drive.google.com/file/d/175aZKPQbnyqGEIdWjJoVStgWavbBLDT_/view?usp=sharing', '850', 1000, 2, 'Những viên kim cương được cắt gọt một cách chính xác tạo nên những đường nét uyển chuyển, là điểm nổi bật của mặt dây chuyền này\r\n', 'Dây chuyền'),
(21, 'Wrap Necklace\r\n', 'https://drive.google.com/file/d/1yC_Zzr3zQcXi_BdO6yKGp6MiECi2kjJb/view?usp=sharing|https://drive.google.com/file/d/1V3dWmzfLqZKDuP4nQe-ZQRQR8QfJiWkv/view?usp=sharing', '600', 1000, 1, 'Gạt bỏ đi sự thanh lịch và lấy cảm hướng từ những người phụ nữ thành phố New York. Chiếc vòng cổ này vừa táo bạo nhưng lại không kém phần tinh tế \r\n', 'Dây chuyền'),
(22, 'Chain Necklace\r\n', 'https://drive.google.com/file/d/1rcyjulfJfnaVtDcRVYfg9CLTtJvKQq_n/view?usp=sharing|https://drive.google.com/file/d/10d8zWL53D72g26S_kmBRvu97g59uJNMN/view?usp=sharing', '1000', 1000, 1, '\"Bằng việc kết hợp chất liệu vàng 18K cùng thiết kế tinh tế, sợi dây chuyền chính là điểm nhấn nổi bật, tô điểm thêm vẻ đẹp thanh lịch và duyên dáng cho nàng. Dây đeo mảnh thích hợp với những bộ trang phục có nhiều họa tiết, đồng thời tạo điểm nhìn cân bằ', 'Dây chuyền'),
(23, 'Link Necklace\r\n', 'https://drive.google.com/file/d/1c_wt0ZcO-RHOBGDww4Ih3-BOjYDVRo_U/view?usp=sharing|https://drive.google.com/file/d/1v-VcMPkqXiFkQv9w5FIOeaMHR6Gojxyp/view?usp=sharing', '1450', 1000, 1, '\"Các liên kết táo bạo được làm nổi bật với kim cương trong Link Necklace này.\r\nĐồng thời để khơi gợi sự chú ý, có thể mix&match với các items khác để không chỉ nổi bật mà còn là tâm điểm của những bữa tiệc nhẹ cuối tuần.\"\r\n', 'Dây chuyền'),
(24, 'Yard Sprinkle Necklace\r\n', 'https://drive.google.com/file/d/1fjEFy15o1_UUvhH_u4Iz2OU1JmcbWvZ0/view?usp=sharing|https://drive.google.com/file/d/1Kiffm-kpwTMfWJx1dRQlQi82nHmvtchc/view?usp=sharing', '1150', 1000, 2, 'Chiếc vòng Yark Sprinkle có các loại đá thiết lập khung hình lấp lánh trên da. Chiếc vòng cổ tinh tế này được rắc với những viên sapphires rực rỡ và kim cương.\r\n', 'Dây chuyền'),
(33, 'Blossom\r\n', 'https://drive.google.com/file/d/1VlBuKqKWJXKVlwqfhloSDLy2CEvkwWmr/view?usp=sharing|https://drive.google.com/file/d/1MZNn2cQxFy5VIEbAPPBG9RyIiuMT5RJR/view?usp=sharing', '850', 1000, 1, 'Vòng tay được lấy cảm hứng thiết kế từ  những cánh hoa anh đào nhẹ nhàng. Thích hợp cho mọi cô gái yêu thích sự dịu dàng, thanh lịch\r\n', 'Vòng tay'),
(34, 'Flora\r\n', 'https://drive.google.com/file/d/1VInGn0_H4JQHBHgqlEtkWRBvDSjTKXaf/view?usp=sharing|https://drive.google.com/file/d/1I8vSGW63eQVY1MWWTge2Il5ZpnIZidY9/view?usp=sharing', '900', 1000, 2, 'Vòng tay chuỗi mảnh, bằng kim loại màu bạc sáng. Thiết kế 3 hoa nối tiếp nhau mang đến tài lộc, may mắn cho người mặc\r\n', 'Vòng tay'),
(35, 'Paddy\r\n', 'https://drive.google.com/file/d/1_Q9gPwvkl_5H-EfLeUe1Y9i_czq47SR7/view?usp=sharing|https://drive.google.com/file/d/1c_bZ8Gdic-BCrFwxxtm_PQ3sY-YAXHWU/view?usp=sharing', '710', 1000, 2, 'Vòng tay được thiết kế basic với điểm nhấn là nhánh lá sang trọng. Màu bạc sáng, tôn da cho các cô gái sở hữu\r\n', 'Vòng tay'),
(36, 'Puppy\r\n', 'https://drive.google.com/file/d/1MWu8UJr2Iq2zqHDwIZqfoWSC71SVdD0f/view?usp=sharing|https://drive.google.com/file/d/1_PEdXEOpEAbRIawuasnwNz9kY_lSKrGD/view?usp=sharing', '650', 1000, 1, 'Lấy ý tưởng từ thú cưng, chiếc vòng tay mang lại cảm giác gần gũi với vật nuôi trong nhà. Thích hợp cho các nàng diện phố\r\n', 'Vòng tay'),
(37, 'Triple\r\n', 'https://drive.google.com/file/d/11rx_QnlWaOBkvM8id1sUhImOrlIEfNLv/view?usp=sharing|https://drive.google.com/file/d/1aOZm7HcnnHabzykg7PBSlA3AxQH3oOtI/view?usp=sharing', '1050', 1000, 2, 'Vòng tay được thiết kế dây đeo đôi thanh mảnh, cùng mặt dây là khoen tròn đen xem lẫn nhau tạo nên cảm giác quý phái, sang trọng\r\n', 'Vòng tay'),
(38, 'Astra\r\n', 'https://drive.google.com/file/d/1_0QdFJc7gvlJGwbFP7yuzN6KrWtVlF8A/view?usp=sharing|https://drive.google.com/file/d/1ylkvv02pYpxXd_h1gcmNkdoQKOgi1ovq/view?usp=sharing', '450', 1000, 2, 'Thiết kế tối giản với ánh bạc kim loại sáng tôn lên vẻ đẹp dịu dàng, nữ tính cho phái nữ. Thích hợp cho các cô gái theo đuổi sự đơn giản trong cuộc sống\r\n', 'Vòng tay'),
(39, 'Lacey\r\n', 'https://drive.google.com/file/d/1Ta_2rQYlNTv_O08yBogJaVA8umRacQQB/view?usp=sharing|https://drive.google.com/file/d/1Ib-FjxzrN0-BrM9sX-m6SjQAtTRfKXj4/view?usp=sharing', '1100', 1000, 1, 'Dây đeo chuỗi mảnh, bằng kim loại bạc với mặt vòng tay kim loại đúc bản to mang đến cảm giác mạnh mẽ, cá tính cho phái nữ\r\n', 'Vòng tay'),
(40, 'Triple Circle\r\n', 'https://drive.google.com/file/d/1y6FtGqfgr4u5apYUWFXhdKXcDejtKEPM/view?usp=sharing|https://drive.google.com/file/d/1N1MKso85B_y2-rglr0mIGdc3yf8B8xHt/view?usp=sharing', '950', 1000, 1, 'Với lối thiết kế kết hợp nhiều dây đan xem với nhau tạo điểm nhấn, cùng với đó là mặt dây khoen kim loại bạc tô thêm nét cá tính cho người đeo\r\n', 'Vòng tay'),
(41, 'Crucifix Ring\r\n', 'https://drive.google.com/file/d/1hY-3UC8mnEJWIz7ypquTR3RDVCo4ph72/view?usp=sharing|https://drive.google.com/file/d/1T5a3-EI1HubTXB47kaTFarCUqvi6Hot2/view?usp=sharing', '399', 1000, 1, 'Nhẫn được lấy cảm hứng thiết kế từ những cây thánh giá nhẹ nhàng. Thích hợp cho mọi cô gái yêu thích sự dịu dàng, thanh lịch\r\n', 'Nhẫn'),
(42, 'Moon Ring\r\n', 'https://drive.google.com/file/d/1sDpeDNMLNKZqxsjWWmfxvQd7DdEi4ucI/view?usp=sharing|https://drive.google.com/file/d/186B2inCMITUkKbAmy3r4cmHw0BMjreJ1/view?usp=sharing', '449', 1000, 2, 'Nhẫn mặt trăng, bằng platium sáng. Thiết kế nối tiếp nhau mang đến tài lộc, may mắn cho người đeo\r\n', 'Nhẫn'),
(43, 'Rabbit Ring\r\n', 'https://drive.google.com/file/d/15KAqwdkRPS2uhUW5Nxym5lukUlD_cme5/view?usp=sharing|https://drive.google.com/file/d/1MnEpWfkClExeAXqkSy9yvFcPJ0IWprTr/view?usp=sharing', '899', 1000, 2, 'Nhẫn được thiết kế basic với điểm nhấn là nhánh cái nơ sang trọng. Màu bạc sáng, tôn da cho các cô gái sở hữu\r\n', 'Nhẫn'),
(44, 'Love Ring\r\n', 'https://drive.google.com/file/d/1p3V51GbOfN9FA3aCMhNtEZFsdDi1AKJZ/view?usp=sharing|https://drive.google.com/file/d/1yKH2gYrH9b1eCgXC3rPNZZQuV2WpoP8L/view?usp=sharing', '849', 1000, 1, 'Lấy ý tưởng từ tình yêu vĩnh cửu mang lại cảm giác gần gũi với người thân trong nhà. Thích hợp cho các nàng diện phố\r\n', 'Nhẫn'),
(45, 'Tiny Ring\r\n', 'https://drive.google.com/file/d/1HRaCpUWONaH9DrMUEPzZKBJubK__D7Gp/view?usp=sharing|https://drive.google.com/file/d/1qA66RPbp6tPILoCH5N05Cw40-1pmy_tQ/view?usp=sharing', '599', 1000, 2, 'Nhẫn được thiết kế dây đeo đôi thanh mảnh, cùng mặt dây là khoen trái tim xem lẫn nhau tạo nên cảm giác quý phái, sang trọng\r\n', 'Nhẫn'),
(46, 'Lucky Ring\r\n', 'https://drive.google.com/file/d/1mogeBZaGJ6Eb4wcVqBBuKAJln8B6xKb5/view?usp=sharing|https://drive.google.com/file/d/1QByOjGo4z5JOy8VR1myjT2CXuRJZ1kaJ/view?usp=sharing', '499', 1000, 2, 'Thiết kế tối giản với ánh bạc kim loại sáng với họa tiết là cỏ 4 lá tôn lên vẻ đẹp dịu dàng, nữ tính cho phái nữ. Thích hợp cho các cô gái theo đuổi sự đơn giản trong cuộc sống\r\n', 'Nhẫn'),
(47, 'Angel Ring\r\n', 'https://drive.google.com/file/d/10fdepPeYHATGyCXNxRtjAdteRtl2qBTJ/view?usp=sharing|https://drive.google.com/file/d/1mc6C61uiwCECSKzOCEhDCptN2sbBbVzm/view?usp=sharing', '399', 1000, 1, 'Nhẫn bằng kim loại bạc với họa tiết đôi cánh kim loại đúc bản to mang đến cảm giác mạnh mẽ, cá tính cho phái nữ\r\n', 'Nhẫn'),
(48, 'Stone Ring\r\n', 'https://drive.google.com/file/d/1N_urrnPjNeI_Aj2gMmkCDEw4d1KhapDs/view?usp=sharing|https://drive.google.com/file/d/1k8oIKSLnZiEODBeydQsx1JHSTgSf1GKd/view?usp=sharing', '1099', 1000, 1, 'Với lối thiết kế kết hợp đá thạch anh tạo điểm nhấn cùng với chất liệu là platium, tô thêm nét cá tính cho người đeo\r\n', 'Nhẫn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `Password`, `Email`, `Phone`, `Address`) VALUES
(1, 'admin', '123456', '', '', 'TP. HCM'),
(2, 'user', '123456', '', '', 'Quang Nam');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `Khoa_Ngoai_product` (`Productid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `Khoa_Ngoai_user` (`UserId`),
  ADD KEY `Khoa_Ngoai_payment` (`PaymentId`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentId`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `Khoa_Ngoai` (`CategoryId`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `Khoa_Ngoai_order` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`OrderId`),
  ADD CONSTRAINT `Khoa_Ngoai_product` FOREIGN KEY (`Productid`) REFERENCES `product` (`ProductId`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Khoa_Ngoai_payment` FOREIGN KEY (`PaymentId`) REFERENCES `payments` (`PaymentId`),
  ADD CONSTRAINT `Khoa_Ngoai_user` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Khoa_Ngoai` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`CategoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
