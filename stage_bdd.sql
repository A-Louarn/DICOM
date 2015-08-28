-- -----------------------------------------------------
-- Table `Patient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Patient` (
    `patient_insee` INTEGER PRIMARY KEY,
    `patient_firstName` VARCHAR(255) NOT NULL,
    `patient_lastName` VARCHAR(255) NOT NULL,
    `patient_dateOfBirth` DATE NOT NULL,
    `patient_sex` VARCHAR(1) NOT NULL,
    `patient_size` INTEGER NOT NULL,
    `patient_weight` INTEGER NOT NULL,
    `patient_typeOfID` VARCHAR(255) NOT NULL, -- //TODO: const = "INSEE"
    `patient_adress` VARCHAR(255) NULL, -- no-form
    `patient_insurancePlanIdentification` VARCHAR(255) NULL, -- //TODO: const = "INSEE"
    `patient_countryOfResidence` VARCHAR(255) NOT NULL, -- //TODO: drop-down list (france Selected)
    `patient_telephoneNumber` INTEGER NULL, -- //TODO
    `patient_additionalHistory` TEXT NULL -- no-form
);


-- -----------------------------------------------------
-- Table `Opérateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Operateur` (
    `operateur_name` VARCHAR(255) PRIMARY KEY
);


-- -----------------------------------------------------
-- Table `Realisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Realisateur` (
    `realisateur_performingPhysicianName` VARCHAR(255) PRIMARY KEY
);


-- -----------------------------------------------------
-- Table `Prescripteur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Prescripteur` (
    `prescripteur_referringPhysicianName` VARCHAR(255) PRIMARY KEY
);

-- -----------------------------------------------------
-- Table `Site`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Site` (
    `InstitutionName` VARCHAR(255) PRIMARY KEY,
    `InstitutionAdress` VARCHAR(255) NOT NULL
);

-- -----------------------------------------------------
-- Table `Bodypart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Bodypart` (
    `bodyPart_anatomicRegionSequence` VARCHAR(255) PRIMARY KEY,
    `bodyPart_Examined` VARCHAR(255) NOT NULL
);

-- -----------------------------------------------------
-- Table `Posture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Posture` (
    `posture_name` VARCHAR(255) PRIMARY KEY
);

-- -----------------------------------------------------
-- Table `AnatomicOrientation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AnatomicOrientation` (
    `anatomicOrientation_name` VARCHAR(255) PRIMARY KEY
);

-- -----------------------------------------------------
-- Table `Examen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Examen` (
    `examen_accessionNumber` INTEGER PRIMARY KEY, -- //TODO: auto-increment
    `examen_instanceCreationDateTime` DATETIME NOT NULL, -- //TODO: auto
    `examen_procedureCodeSequence` VARCHAR(255) NOT NULL, -- //TODO: no-form
    `examen_institutionalDepartementName` VARCHAR(255) NULL, -- //TODO: service (link to other table)
    `examen_protocolName` VARCHAR(255) NOT NULL, -- //TODO: const = ?
    `examen_performedProcedureStepID` VARCHAR(255) NOT NULL, -- //TODO: const = default
    `examen_performedProcedureStepDescription` VARCHAR(255) NULL, -- //TODO: no-form
    `examen_contentDateTime` DATETIME NOT NULL, -- //TODO: auto (== instanceCreationDateTime)
    `examen_instanceCreatorUID` VARCHAR(255) NOT NULL, -- //TODO: const = default
    `bodyPart_anatomicRegionSequence` VARCHAR(255) NOT NULL,
    `anatomicOrientation_name` VARCHAR(255) NOT NULL,
    `posture_name` VARCHAR(255) NOT NULL,
    `operateur_name` VARCHAR(255) NOT NULL,
    `realisateur_performingPhysicianName` VARCHAR(255) NOT NULL,
    `prescripteur_referringPhysicianName` VARCHAR(255) NOT NULL,
    FOREIGN KEY(bodyPart_anatomicRegionSequence) REFERENCES Bodypart(bodyPart_anatomicRegionSequence),
    FOREIGN KEY(anatomicOrientation_name) REFERENCES AnatomicOrientation(anatomicOrientation_name),
    FOREIGN KEY(posture_name) REFERENCES Posture(posture_name),
    FOREIGN KEY(operateur_name) REFERENCES Operateur(operateur_name),
    FOREIGN KEY(realisateur_performingPhysicianName) REFERENCES Realisateur(realisateur_performingPhysicianName),
    FOREIGN KEY(prescripteur_referringPhysicianName) REFERENCES Prescripteur(prescripteur_referringPhysicianName)
);


-- -----------------------------------------------------
-- Table `DICOM`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DICOM` (
    `dicom_IP` VARCHAR(255) PRIMARY KEY,
    `dicom_port` VARCHAR(255) NOT NULL,
    `dicom_transfertSyntaxeUID` VARCHAR(255) NOT NULL
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
-- Table `Console`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Console` (
    `console_SourceApplicationEntityTitle` VARCHAR(255) PRIMARY KEY,
    `console_StationName` VARCHAR(255) NOT NULL,
    `console_DeviceSerialNumber` VARCHAR(255) NOT NULL,
    `console_PerformedStationAETitle` VARCHAR(255) NOT NULL,
    `console_PerformedStationName` VARCHAR(255) NOT NULL,
    `console_col` VARCHAR(45) NULL,
    `dicom_IP` VARCHAR(255) NOT NULL,
    FOREIGN KEY(dicom_IP) REFERENCES Dicom(dicom_IP)
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
-- Table `Serie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Serie` (
    `serie_description` INTEGER PRIMARY KEY,
    `serie_number` INTEGER NOT NULL,
    `serie_instanceNumber` INTEGER NOT NULL,
    `serie_imagesInAcquisition` INTEGER NOT NULL,
    `serie_serieDatetime` DATETIME NOT NULL,
    `serie_acquisitionDatetime` DATETIME NOT NULL,
    `serie_instanceUID` VARCHAR(255) NOT NULL,
    `serie_frameOfReferenceUID` VARCHAR(255) NOT NULL,
    `serie_mediaStorageSOPClassUID` VARCHAR(255) NOT NULL,
    `serie_SOPClassUID` VARCHAR(255) NOT NULL,
    `serie_referencedSOPClassUID` VARCHAR(255) NOT NULL,
    `study_id` INTEGER NOT NULL,
    FOREIGN KEY(study_id) REFERENCES Study(study_id)
);


-- -----------------------------------------------------
-- Table `Image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Image` (
    `image_reference` INTEGER PRIMARY KEY,
    `image_sampelPerPixel` INTEGER NOT NULL,
    `image_sampelPerPixelUsed` INTEGER NOT NULL,
    `image_photometricInterpretation` VARCHAR(255) NOT NULL,
    `image_rows` INTEGER NOT NULL,
    `image_columns` INTEGER NOT NULL,
    `image_bitAllocated` INTEGER NOT NULL,
    `image_bitStoraged` INTEGER NOT NULL,
    `image_pixelRepresentation` INTEGER NOT NULL,
    `image_windowCenter` INTEGER NOT NULL,
    `image_windowWith` INTEGER NOT NULL,
    `image_waveformDisplayBkgCIELabValue` VARCHAR(255) NOT NULL,
    `image_channelRecommendDisplayCIELabValue` VARCHAR(255) NOT NULL,
    `image_numericValue` INTEGER NOT NULL,
    `image_imageFrameOrigin` INTEGER NOT NULL,
    `image_annotationSequence` VARCHAR(255) NULL,
    `image_unformattedTextValue` VARCHAR(255) NULL,
    `image_graphicLayerDescription` VARCHAR(255) NULL,
    `image_overlayRows` INTEGER NOT NULL,
    `image_overlayColumns` INTEGER NOT NULL,
    `image_overlayDescription` VARCHAR(255) NOT NULL,
    `image_overlayType` VARCHAR(1) NOT NULL,
    `image_overlayOrigin` VARCHAR(3) NOT NULL,
    `image_overlayBitsAllocated` INTEGER NOT NULL,
    `image_overlayBitPosition` INTEGER NOT NULL,
    `image_overlayData` INTEGER NOT NULL,
    `image_pixelData` INTEGER NOT NULL,
    `image_referencedImageSequence` VARCHAR(255) NOT NULL,
    `image_mediaStorageSOPInstanceUID` VARCHAR(255) NOT NULL,
    `image_SOPInstanceUID` VARCHAR(255) NOT NULL,
    `image_referencedSOPInstanceUID` VARCHAR(255) NOT NULL,
    `serie_description` INTEGER NOT NULL,
    FOREIGN KEY(serie_description) REFERENCES Serie(serie_description)
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
-- Table `Patient_has_Examen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Patient_has_Examen` (
    `patient_insee` INTEGER NOT NULL,
    `examen_accessionNumber` INTEGER NOT NULL,
    FOREIGN KEY(patient_insee) REFERENCES Patient(patient_insee),
    FOREIGN KEY(examen_accessionNumber) REFERENCES Examen(examen_accessionNumber)
);
