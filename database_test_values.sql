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

-- Patient
INSERT INTO Patient (patient_insee, patient_firstName, patient_lastName, patient_dateOfBirth, patient_sex, patient_size, patient_weight, patient_typeOfID, patient_adress, patient_insurancePlanIdentification, patient_countryOfResidence, patient_telephoneNumber, patient_additionalHistory) VALUES ('0', 'Bruce', 'Wayne', '2015-01-13', 'M', '180', '90', 'INSEE', 'Manor Wayne, Gotham City', 'INSEE', 'US', NULL, NULL);