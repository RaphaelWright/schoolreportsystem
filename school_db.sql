SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `marks` (
  `student_number` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `english_cs` int(11) NOT NULL,
  `english_es` int(11) NOT NULL,
  `maths_cs` int(11) NOT NULL,
  `maths_es` int(11) NOT NULL,
  `science_cs` int(11) NOT NULL,
  `science_es` int(11) NOT NULL,
  `owop_cs` int(11) NOT NULL,
  `owop_es` int(11) NOT NULL,
  `arts_cs` int(11) NOT NULL,
  `arts_es` int(11) NOT NULL,
  `history_cs` int(11) NOT NULL,
  `history_es` int(11) NOT NULL,
  `french_cs` int(11) NOT NULL,
  `french_es` int(11) NOT NULL,
  `ict_cs` int(11) NOT NULL,
  `ict_es` int(11) NOT NULL,
  `twiga_cs` int(11) NOT NULL,
  `twiga_es` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Table structure for table `teachers`
--
CREATE TABLE `teachers` (
  `name` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`username`);
COMMIT;

