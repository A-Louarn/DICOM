-- Site
INSERT INTO Site VALUES('Hôpital Sud','Rennes');

-- Operateur
INSERT INTO Operateur VALUES('Dr. Zoidberg');
INSERT INTO Operateur VALUES('Dr. Frankenstein');
INSERT INTO Operateur VALUES('Dr. Strange');

-- Realisateur
INSERT INTO Realisateur VALUES('Dr. Cooper');
INSERT INTO Realisateur VALUES('Dr. Lecter');
INSERT INTO Realisateur VALUES('Dr. House');

-- Prescripteur
INSERT INTO Prescripteur VALUES('Dr. Watson');
INSERT INTO Prescripteur VALUES('Dr. Jekyll');
INSERT INTO Prescripteur VALUES('Dr. McCoy');

-- Bodypart
INSERT INTO Bodypart VALUES("Bras","Bras");
INSERT INTO Bodypart VALUES("Mollet","Mollet");
INSERT INTO Bodypart VALUES("Ventre","Ventre");

-- Posture
INSERT INTO Posture VALUES("Repos");
INSERT INTO Posture VALUES("Contraction");
INSERT INTO Posture VALUES("Extension");

-- AnatomicOrientation
INSERT INTO AnatomicOrientation VALUES("Debout");
INSERT INTO AnatomicOrientation VALUES("Allongé");

-- Patient
INSERT INTO Patient (patient_insee, patient_firstName, patient_lastName, patient_dateOfBirth, patient_sex, patient_size, patient_weight, patient_typeOfID, patient_adress, patient_insurancePlanIdentification, patient_countryOfResidence, patient_telephoneNumber, patient_additionalHistory) VALUES ('0', 'Bruce', 'Wayne', '2015-01-13', 'M', '180', '90', 'INSEE', 'Manor Wayne, Gotham City', 'INSEE', 'US', NULL, NULL);
INSERT INTO Patient (patient_insee, patient_firstName, patient_lastName, patient_dateOfBirth, patient_sex, patient_size, patient_weight, patient_typeOfID, patient_adress, patient_insurancePlanIdentification, patient_countryOfResidence, patient_telephoneNumber, patient_additionalHistory) VALUES ('1', 'Tony', 'Stark', '1975-07-28', 'M', '190', '85', 'INSEE', '10880 Malibu Point, 90265', 'INSEE', 'US', NULL, NULL);
