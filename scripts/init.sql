CREATE DATABASE IF NOT EXISTS myDB;

USE myDB;

CREATE TABLE `MEMBERS` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MEMBERS`
--

INSERT INTO `MEMBERS` (`id`, `name`, `email`, `phone`) VALUES
(1, 'mr.rich verymuch ', 'tt@xd.com', '0123456789'),
(2, 'mrs.bell jinglebell', 'tk@xd.com', '0987654321');

--
-- Indexes for table `MEMBERS`
--
ALTER TABLE `MEMBERS`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `MEMBERS`
--
ALTER TABLE `MEMBERS`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;