-- =====================================================
-- Database: db_music
-- Tables: artist, song
-- Author: L
-- =====================================================

CREATE DATABASE IF NOT EXISTS db_music;
USE db_music;

-- =====================================================
-- Table: artist
-- =====================================================
CREATE TABLE artist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    country VARCHAR(100),
    debut_year INT,
    genre VARCHAR(100)
);

-- =====================================================
-- Table: song
-- =====================================================
CREATE TABLE song (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    release_year INT,
    artist_id INT,
    FOREIGN KEY (artist_id) REFERENCES artist(id)
        ON DELETE CASCADE
);

-- =====================================================
-- Insert Data: artist
-- =====================================================
INSERT INTO artist (name, country, debut_year, genre) VALUES
('Faozia', 'Canada', 2015, 'Pop / Alternative'),
('Chris Grey', 'Canada', 2020, 'Pop / R&B'),
('Chase Atlantic', 'Australia', 2014, 'Alternative / R&B'),
('Jackson Wang', 'China', 2017, 'Pop / R&B'),
('Henry Moodie', 'UK', 2022, 'Pop'),
('Johnny Huynh', 'Australia', 2021, 'Indie Pop'),
('Melanie Martinez', 'USA', 2014, 'Alternative Pop'),
('Allegra Jordyn', 'Canada', 2019, 'Indie Pop');

-- =====================================================
-- Insert Data: song
-- =====================================================
INSERT INTO song (title, release_year, artist_id) VALUES
-- Faozia
('Minefields', 2020, 1),
('Peace & Violence', 2021, 1),
('RIP Love', 2022, 1),

-- Chris Grey
('You Cant Save Me', 2023, 2),
('Let the World Burn', 2023, 2),
('Bring Me Back to Life', 2022, 2),

-- Chase Atlantic
('Swim', 2017, 3),
('Friends', 2022, 3),

-- Jackson Wang
('Blow', 2022, 4),
('LMLY', 2021, 4),
('Made Me A Man', 2023, 4),

-- Henry Moodie
('You Were There for Me', 2022, 5),
('Pick Up the Phone', 2023, 5),

-- Johnny Huynh
('Call Me When You Get This', 2021, 6),
('Stay', 2022, 6),
('Red Rose', 2023, 6),

-- Melanie Martinez
('Play Date', 2015, 7),
('Soap', 2015, 7),

-- Allegra Jordyn
('Talk of the Town', 2021, 8),
('Falling Behind', 2022, 8),
('Corpse Bride', 2023, 8),
('Last Love', 2022, 8);
-- =====================================================
