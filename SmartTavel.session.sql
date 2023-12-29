-- Drop Database 
DROP DATABASE IF EXISTS SmartTravelv2;
-- Create Database
CREATE DATABASE SmartTravelv2;
-- Use Database
USE SmartTravelv2;
-- User Table
CREATE TABLE City (
    cityID INT PRIMARY KEY AUTO_INCREMENT,
    cityName VARCHAR(255)
);
-- Table for Company
CREATE TABLE Company (
    companyID INT PRIMARY KEY AUTO_INCREMENT,
    companyName VARCHAR(255)
);
-- Table for Bus
CREATE TABLE Bus (
    busID INT PRIMARY KEY AUTO_INCREMENT,
    busNumber INT,
    licensePlate VARCHAR(255),
    companyID INT,
    capacity INT,
    FOREIGN KEY (companyID) REFERENCES Company(companyID)
);
-- Table for Route
CREATE TABLE Route (
    routeID INT PRIMARY KEY AUTO_INCREMENT,
    startCityID INT,
    endCityID INT,
    distance VARCHAR(255),
    duration TIME,
    FOREIGN KEY (startCityID) REFERENCES City(cityID),
    FOREIGN KEY (endCityID) REFERENCES City(cityID),
    CHECK (startCityID != endCityID)
);
-- Table for Horaire
CREATE TABLE Schedule (
    scheduleID INT PRIMARY KEY AUTO_INCREMENT,
    date DATE,
    departureTime TIME,
    arrivalTime TIME,
    availableSeats INT,
    busID INT,
    routeID INT,
    FOREIGN KEY (busID) REFERENCES Bus(busID),
    FOREIGN KEY (routeID) REFERENCES Route(routeID)
);
INSERT INTO City (cityName)
VALUES ('Casablanca'),
    ('Fez'),
    ('Tangier'),
    ('Marrakesh'),
    ('Salé'),
    ('Meknes'),
    ('Rabat'),
    ('Oujda'),
    ('Kenitra'),
    ('Agadir'),
    ('Tetouan'),
    ('Temara'),
    ('Safi'),
    ('Mohammedia'),
    ('Khouribga'),
    ('El Jadida'),
    ('Beni Mellal'),
    ('Aït Melloul'),
    ('Nador'),
    ('Dar Bouazza'),
    ('Taza'),
    ('Settat'),
    ('Berrechid'),
    ('Khemisset'),
    ('Inezgane'),
    ('Ksar El Kebir'),
    ('Larache'),
    ('Guelmim'),
    ('Khenifra'),
    ('Berkane'),
    ('Taourirt'),
    ('Bouskoura'),
    ('Fquih Ben Salah'),
    ('Dcheira El Jihadia'),
    ('Oued Zem'),
    ('El Kelaa Des Sraghna'),
    ('Sidi Slimane'),
    ('Errachidia'),
    ('Guercif'),
    ('Oulad Teima'),
    ('Ben Guerir'),
    ('Tifelt'),
    ('Lqliaa'),
    ('Taroudant'),
    ('Sefrou'),
    ('Essaouira'),
    ('Fnideq'),
    ('Sidi Kacem'),
    ('Tiznit'),
    ('Tan-Tan'),
    ('Ouarzazate'),
    ('Souk El Arbaa'),
    ('Youssoufia'),
    ('Lahraouyine'),
    ('Martil'),
    ('Ain Harrouda'),
    ('Suq as-Sabt Awlad an-Nama'),
    ('Skhirat'),
    ('Ouazzane'),
    ('Benslimane'),
    ('Al Hoceima'),
    ('Beni Ansar'),
    ('Mdiq'),
    ('Sidi Bennour'),
    ('Midelt'),
    ('Azrou'),
    ('Drargua');
-- Insert routes between cities
INSERT INTO Route (startCityID, endCityID, distance, duration)
VALUES (4, 5, '150 km', '2:15:00'),
    -- Marrakesh to Salé
    (4, 6, '250 km', '3:30:00'),
    -- Marrakesh to Meknes
    (4, 7, '320 km', '4:15:00'),
    -- Marrakesh to Rabat
    (5, 6, '200 km', '3:00:00'),
    -- Salé to Meknes
    (5, 7, '100 km', '1:30:00'),
    -- Salé to Rabat
    (6, 7, '300 km', '4:30:00'),
    -- Meknes to Rabat
    (8, 9, '180 km', '2:15:00'),
    -- Oujda to Kenitra
    (8, 10, '400 km', '5:00:00'),
    -- Oujda to Agadir
    (9, 10, '350 km', '4:30:00'),
    -- Kenitra to Agadir
    (11, 12, '120 km', '1:45:00'),
    -- Tetouan to Temara
    (11, 13, '220 km', '3:00:00'),
    -- Tetouan to Safi
    (12, 13, '180 km', '2:30:00'),
    -- Temara to Safi
    -- Add more routes as needed
    (20, 25, '280 km', '3:45:00');
-- Insert companies
INSERT INTO Company (companyName)
VALUES ('Supratours'),
    ('SATAS'),
    ('Autocars Bardia'),
    ('Autocars Zerktouni'),
    ('Trans Ghazala'),
    ('Alsa Maroc'),
    ('SupraTours Sahara'),
    ('Kamel Transports'),
    ('Transavia'),
    ('Tarik Express');
-- Insert data into the Bus table for buses of the new companies
INSERT INTO Bus (
        busNumber,
        licensePlate,
        companyID,
        capacity
    )
VALUES (101, 'AB123CD', 1, 50),
    -- Supratours
    (202, 'EF456GH', 2, 45),
    -- SATAS
    (303, 'IJ789KL', 3, 55),
    -- Autocars Bardia
    (404, 'MN012OP', 4, 40),
    -- Autocars Zerktouni
    (505, 'QR345ST', 5, 60),
    -- Trans Ghazala
    (606, 'UV678WX', 6, 55),
    -- Alsa Maroc
    (707, 'YZ901AB', 7, 45),
    -- SupraTours Sahara
    (808, 'CD234EF', 8, 50),
    -- Kamel Transports
    (909, 'GH567IJ', 9, 40),
    -- Transavia
    (1010, 'KL890MN', 10, 60);