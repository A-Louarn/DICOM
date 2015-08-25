-- -----------------------------------------------------
-- Table `Patient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Patient` (
  `patient_id` INTEGER PRIMARY KEY,
  `patient_name` VARCHAR(255) NOT NULL,
  `patient_dateOfBirth` DATE NOT NULL,
  `patient_sex` VARCHAR(1) NOT NULL,
  `patient_size` INTEGER NOT NULL,
  `patient_weight` INTEGER NOT NULL,
  `patient_typeOfID` VARCHAR(255) NOT NULL,
  `patient_adress` VARCHAR(255) NULL,
  `patient_insurancePlanIdentification` VARCHAR(255) NULL,
  `patient_contryOfResidence` VARCHAR(255) NOT NULL,
  `patient_telephoneNumber` INTEGER NULL,
  `patient_additionalHistory` TEXT NULL
);


-- -----------------------------------------------------
-- Table `Examen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Examen` (
  `examen_accessionNumber` INTEGER PRIMARY KEY,
  `examen_instanceCreationDate` DATE NOT NULL,
  `examen_instanceCreationTime` DATETIME NOT NULL,
  `examen_procedureCodeSequence` VARCHAR(255) NOT NULL,
  `examen_institutionalDepartementName` VARCHAR(255) NULL,
  `examen_protocolName` VARCHAR(255) NOT NULL,
  `examen_anatomicRegionSequence` VARCHAR(255) NOT NULL,
  `examen_anatomicOrientationType` VARCHAR(255) NOT NULL,
  `examen_bodyPartExamined` VARCHAR(255) NOT NULL,
  `examen_patientPosition` VARCHAR(255) NOT NULL,
  `examen_performedProcedureStepID` VARCHAR(255) NOT NULL,
  `examen_performedProcedureStepDescription` VARCHAR(255) NOT NULL,
  `examen_contentDate` DATE NOT NULL,
  `examen_contentTime` DATETIME NOT NULL,
  `examen_instanceCreatorUID` VARCHAR(255) NOT NULL
);


-- -----------------------------------------------------
-- Table `Opérateur` TODO
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Operateur` (
  `OperatorIDSequence` VARCHAR(2) PRIMARY KEY,
  `OperatorName` VARCHAR(255) NOT NULL,
  `Examen_AccessionNumber` INTEGER NOT NULL,
  INDEX `fk_Opérateur_Examen1_idx` (`Examen_AccessionNumber` ASC) ,
  CONSTRAINTEGER `fk_Opérateur_Examen1`
    FOREIGN KEY (`Examen_AccessionNumber`)
    REFERENCES `Examen` (`AccessionNumber`)
);


-- -----------------------------------------------------
-- Table `Realisateur` TODO
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Realisateur` (
  `PerformingPhysicianIDSequence` VARCHAR(2) NOT NULL,
  `PerformingPhysicianName` VARCHAR(255) NOT NULL,
  `Examen_AccessionNumber` INTEGER NOT NULL,
  PRIMARY KEY (`PerformingPhysicianIDSequence`) ,
  INDEX `fk_Realisateur_Examen1_idx` (`Examen_AccessionNumber` ASC) ,
  CONSTRAINTEGER `fk_Realisateur_Examen1`
    FOREIGN KEY (`Examen_AccessionNumber`)
    REFERENCES `Examen` (`AccessionNumber`)


);


-- -----------------------------------------------------
-- Table `Prescripteur` TODO
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Prescripteur` (
  `ReferringPhysicianIDSequence` VARCHAR(2) NOT NULL,
  `ReferringPhysicianName` VARCHAR(255) NOT NULL,
  `Examen_AccessionNumber` INTEGER NOT NULL,
  PRIMARY KEY (`ReferringPhysicianIDSequence`) ,
  INDEX `fk_Prescripteur_Examen1_idx` (`Examen_AccessionNumber` ASC) ,
  CONSTRAINTEGER `fk_Prescripteur_Examen1`
    FOREIGN KEY (`Examen_AccessionNumber`)
    REFERENCES `Examen` (`AccessionNumber`)


);


-- -----------------------------------------------------
-- Table `Site`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Site` (
  `InstitutionName` VARCHAR(255) PRIMARY KEY,
  `InstitutionAdress` VARCHAR(255) NOT NULL
);


-- -----------------------------------------------------
-- Table `DICOM`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DICOM` (
  `IP` VARCHAR(255) PRIMARY KEY,
  `Port` VARCHAR(255) NOT NULL,
  `TransfertSyntaxeUID` VARCHAR(255) NOT NULL
);


-- -----------------------------------------------------
-- Table `Produit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Produit` (
  `produit_implementationVersionName` INTEGER PRIMARY KEY,
  `produit_privateInformation` VARCHAR(255) NULL,
  `produit_specificCaractereSet` VARCHAR(255) NOT NULL,
  `produit_imageType` VARCHAR(255) NOT NULL,
  `produit_modality` TEXT NOT NULL,
  `produit_manufacturer` VARCHAR(255) NOT NULL,
  `produit_manufacturerModelName` VARCHAR(255) NOT NULL,
  `produit_softwareVersion` TEXT NOT NULL,
  `produit_lastCalibration` DATETIME NOT NULL,
  `produit_implementationClassUID` VARCHAR(255) NOT NULL
);


-- -----------------------------------------------------
-- Table `Console` TODO
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Console` (
  `SourceApplicationEntityTitle` VARCHAR(255) NOT NULL,
  `StationName` VARCHAR(255) NOT NULL,
  `DeviceSerialNumber` VARCHAR(255) NOT NULL,
  `PerformedStationAETitle` VARCHAR(255) NOT NULL,
  `PerformedStationName` VARCHAR(255) NOT NULL,
  `DICOM_IP` VARCHAR(255) NOT NULL,
  `Consolecol` VARCHAR(45) NULL,
  PRIMARY KEY (`SourceApplicationEntityTitle`, `DICOM_IP`) ,
  INDEX `fk_Console_DICOM1_idx` (`DICOM_IP` ASC) ,
  CONSTRAINTEGER `fk_Console_DICOM1`
    FOREIGN KEY (`DICOM_IP`)
    REFERENCES `DICOM` (`IP`)


);


-- -----------------------------------------------------
-- Table `Study`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Study` (
  `study_id` INTEGER PRIMARY KEY,
  `study_aquisitionsOnStudy` INTEGER NOT NULL,
  `study_datetime` DATETIME NOT NULL,
  `study_referencedStudySequence` VARCHAR(255) NOT NULL
);


-- -----------------------------------------------------
-- Table `Serie` TODO
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Serie` (
  `SeriesDescription` INTEGER NOT NULL,
  `SeriesNumber` INTEGER NOT NULL,
  `InstanceNumber` INTEGER NOT NULL,
  `ImagesInAcquisition` INTEGER NOT NULL,
  `SerieDate` DATE NOT NULL,
  `SerieTime` DATETIME NOT NULL,
  `AcquisitionDate` DATE NOT NULL,
  `AcquisitionTime` DATETIME NOT NULL,
  `SerieInstanceUID` VARCHAR(255) NOT NULL,
  `FrameOfReferenceUID` VARCHAR(255) NOT NULL,
  `MediaStorageSOPClassUID` VARCHAR(255) NOT NULL,
  `SOPClassUID` VARCHAR(255) NOT NULL,
  `ReferencedSOPClassUID` VARCHAR(255) NOT NULL,
  `Study_StudyID` INTEGER NOT NULL,
  PRIMARY KEY (`SeriesDescription`, `Study_StudyID`) ,
  INDEX `fk_Serie_Study1_idx` (`Study_StudyID` ASC) ,
  CONSTRAINTEGER `fk_Serie_Study1`
    FOREIGN KEY (`Study_StudyID`)
    REFERENCES `Study` (`StudyID`)


);


-- -----------------------------------------------------
-- Table `Image` TODO
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Image` (
  `Reference` INTEGER NOT NULL,
  `SampelPerPixel` INTEGER NOT NULL,
  `SampelPerPixelUsed` INTEGER NOT NULL,
  `PhotometricInterpretation` VARCHAR(255) NOT NULL,
  `Rows` INTEGER NOT NULL,
  `Columns` INTEGER NOT NULL,
  `BitAllocated` INTEGER NOT NULL,
  `BitStoraged` INTEGER NOT NULL,
  `PixelRepresentation` INTEGER NOT NULL,
  `WindowCenter` INTEGER NOT NULL,
  `WindowWith` INTEGER NOT NULL,
  `WaveformDisplayBkgCIELabValue` VARCHAR(255) NOT NULL,
  `ChannelRecommendDisplayCIELabValue` VARCHAR(255) NOT NULL,
  `NumericValue` INTEGER NOT NULL,
  `ImageFrameOrigin` INTEGER NOT NULL,
  `AnnotationSequence` VARCHAR(255) NULL,
  `UnformattedTextValue` VARCHAR(255) NULL,
  `GraphicLayerDescription` VARCHAR(255) NULL,
  `OverlayRows` INTEGER NOT NULL,
  `OverlayColumns` INTEGER NOT NULL,
  `OverlayDescription` VARCHAR(255) NOT NULL,
  `OverlayType` VARCHAR(1) NOT NULL,
  `OverlayOrigin` VARCHAR(3) NOT NULL,
  `OverlayBitsAllocated` INTEGER NOT NULL,
  `OverlayBitPosition` INTEGER NOT NULL,
  `OverlayData` INTEGER NOT NULL,
  `PixelData` INTEGER NOT NULL,
  `ReferencedImageSequence` VARCHAR(255) NOT NULL,
  `MediaStorageSOPInstanceUID` VARCHAR(255) NOT NULL,
  `SOPInstanceUID` VARCHAR(255) NOT NULL,
  `ReferencedSOPInstanceUID` VARCHAR(255) NOT NULL,
  `Serie_SeriesDescription` INTEGER NOT NULL,
  PRIMARY KEY (`Reference`, `Serie_SeriesDescription`) ,
  INDEX `fk_Image_Serie_idx` (`Serie_SeriesDescription` ASC) ,
  CONSTRAINTEGER `fk_Image_Serie`
    FOREIGN KEY (`Serie_SeriesDescription`)
    REFERENCES `Serie` (`SeriesDescription`)


);


-- -----------------------------------------------------
-- Table `Signal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Signal` (
  `signal_waveformOriginality` INTEGER PRIMARY KEY,
  `signal_numberOfWaveformChannel` INTEGER NOT NULL,
  `signal_numberOfWaveformSamples` INTEGER NOT NULL,
  `signal_samplingFrequency` INTEGER NOT NULL,
  `signal_channelDefinitionSequence` TEXT NOT NULL,
  `signal_waveformChannelNumber` INTEGER NOT NULL,
  `signal_channelLabel` VARCHAR(255) NOT NULL,
  `signal_channelStatut` TEXT NOT NULL,
  `signal_channelSourcesSequence` VARCHAR(255) NOT NULL,
  `signal_channelSensitivityCorrection` INTEGER NULL,
  `signal_channelBaseline` INTEGER NULL,
  `signal_channelOfset` DATETIME NOT NULL,
  `signal_waveformBitStored` INTEGER NOT NULL,
  `signal_notchFilterBandwitdh` INTEGER NULL,
  `signal_measurementUnit` TEXT NOT NULL,
  `signal_waveformSequence` VARCHAR(255) NOT NULL
);


-- -----------------------------------------------------
-- Table `Patient_has_Examen` TODO
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Patient_has_Examen` (
  `Patient_PatientID` INTEGER NOT NULL,
  `Examen_AccessionNumber` INTEGER NOT NULL,
  PRIMARY KEY (`Patient_PatientID`, `Examen_AccessionNumber`) ,
  INDEX `fk_Patient_has_Examen_Examen1_idx` (`Examen_AccessionNumber` ASC) ,
  INDEX `fk_Patient_has_Examen_Patient1_idx` (`Patient_PatientID` ASC) ,
  CONSTRAINTEGER `fk_Patient_has_Examen_Patient1`
    FOREIGN KEY (`Patient_PatientID`)
    REFERENCES `Patient` (`PatientID`),
  CONSTRAINTEGER `fk_Patient_has_Examen_Examen1`
    FOREIGN KEY (`Examen_AccessionNumber`)
    REFERENCES `Examen` (`AccessionNumber`)
);
