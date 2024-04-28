DROP TABLE IF EXISTS `UserLocations`;

CREATE TABLE `UserLocations` (
  `user_id` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `southwest_lat` double NOT NULL,
  `southwest_lng` double NOT NULL,
  `northeast_lat` double NOT NULL,
  `northeast_lng` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
