-- Drap Database
DROP DATABASE IF NOT EXISTS STV2;
-- Create Database
CREATE DATABASE IF NOT EXISTS STV2;
USE STV2;
-- Users Table
CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    IsActive BOOLEAN NOT NULL,
    RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Operators Table
CREATE TABLE Operators (
    OperatorID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    IsActive BOOLEAN NOT NULL
);
-- Admins Table
CREATE TABLE Admins (
    AdminID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL
);
-- Routes Table
CREATE TABLE Routes (
    RouteID INT PRIMARY KEY AUTO_INCREMENT,
    DepartureCity VARCHAR(255) NOT NULL,
    DestinationCity VARCHAR(255) NOT NULL,
    Distance INT NOT NULL,
    Duration INT NOT NULL
);
-- Buses Table
CREATE TABLE Buses (
    BusID INT PRIMARY KEY AUTO_INCREMENT,
    BusNumber VARCHAR(255) NOT NULL,
    Imm VARCHAR(255) NOT NULL,
    Capacity INT NOT NULL
);
-- Trips Table
CREATE TABLE Trips (
    TripID INT PRIMARY KEY AUTO_INCREMENT,
    SourceCity VARCHAR(255) NOT NULL,
    DestinationCity VARCHAR(255) NOT NULL,
    DepartureTime DATETIME NOT NULL,
    ArrivalTime DATETIME NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Distance INT NOT NULL,
    RouteID INT,
    BusID INT,
    FOREIGN KEY (RouteID) REFERENCES Routes(RouteID),
    FOREIGN KEY (BusID) REFERENCES Buses(BusID)
);
-- Reservations Table
CREATE TABLE Reservations (
    ReservationID INT PRIMARY KEY AUTO_INCREMENT,
    TripID INT,
    UserID INT,
    SeatNumber INT NOT NULL,
    ReservationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (TripID) REFERENCES Trips(TripID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);
-- Points Table
CREATE TABLE Points (
    PointID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Points INT NOT NULL,
    TripID INT,
    ReservationID INT,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (TripID) REFERENCES Trips(TripID),
    FOREIGN KEY (ReservationID) REFERENCES Reservations(ReservationID)
);
-- Notifications Table
CREATE TABLE Notifications (
    NotificationID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Message VARCHAR(255) NOT NULL,
    IsRead BOOLEAN NOT NULL DEFAULT FALSE,
    NotificationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);