# Database     
데이터베이스설계 LAMP환경 구축     
주요 IP는 #으로 처리.    
AWS EC2사용, Mysql, PHP, HTML    
MySQL 생성     
CREATE TABLE Employee    
(    
    `Employee_ID`    VARCHAR(45)    NOT NULL,     
    `Employee_Name`  VARCHAR(45)    NULL,     
    `Position`       VARCHAR(45)    NULL,     
    `Phone`          VARCHAR(45)    NULL,    
    `Address`        VARCHAR(45)    NULL,     
    `Department`     VARCHAR(45)    NULL,    
    `Boss_ID`        VARCHAR(45)    NULL,   
    PRIMARY KEY (Employee_ID)  
);   
ALTER TABLE Employee    
    ADD CONSTRAINT FK_Employee_Boss_ID_Employee_Employee_ID FOREIGN KEY (Boss_ID)  
        REFERENCES Employee (Employee_ID) ON DELETE RESTRICT ON UPDATE RESTRICT;    
             
CREATE TABLE Cell      
(   
    `Cell_Num`      VARCHAR(45)    NOT NULL,    
    `Cell_Maneger`  VARCHAR(45)    NULL,      
    PRIMARY KEY (Cell_Num)   
);   
   
ALTER TABLE Cell     
    ADD CONSTRAINT FK_Cell_Cell_Maneger_Employee_Employee_ID FOREIGN KEY (Cell_Maneger)   
        REFERENCES Employee (Employee_ID) ON DELETE RESTRICT ON UPDATE RESTRICT;     
CREATE TABLE Prisoner   
(       
    `Prisoner_Num`   VARCHAR(45)    NOT NULL,     
    `Prisoner_Name`  VARCHAR(45)    NULL,     
    `Entrance_Date`  VARCHAR(45)    NULL,     
    `Crime_Type`     VARCHAR(45)    NULL,   
    `Cell_Num`       VARCHAR(45)    NULL,    
    `Exit_Date`      VARCHAR(45)    NULL,     
    `Crime_Level`    VARCHAR(45)    NULL,     
    PRIMARY KEY (Prisoner_Num)   
);    
       
ALTER TABLE Prisoner  
    ADD CONSTRAINT FK_Prisoner_Cell_Num_Cell_Cell_Num FOREIGN KEY (Cell_Num)     
        REFERENCES Cell (Cell_Num) ON DELETE RESTRICT ON UPDATE RESTRICT;    
            
CREATE TABLE Program   
(    
    `Program_Num`      VARCHAR(45)    NOT NULL,    
    `Program_Name`     VARCHAR(45)    NULL,     
    `Program_Manager`  VARCHAR(45)    NULL,   
    PRIMARY KEY (Program_Num)    
);  

ALTER TABLE Program    
    ADD CONSTRAINT FK_Program_Program_Manager_Employee_Employee_ID FOREIGN KEY (Program_Manager)    
        REFERENCES Employee (Employee_ID) ON DELETE RESTRICT ON UPDATE RESTRICT;    
   
CREATE TABLE Account   
(    
    `Accout_Num`    VARCHAR(45)    NOT NULL,     
    `Prisoner_Num`  VARCHAR(45)    NOT NULL,     
    `Amount`        VARCHAR(45)    NULL,      
    PRIMARY KEY (Accout_Num)    
);       
    
ALTER TABLE Account
    ADD CONSTRAINT FK_Account_Prisoner_Num_Prisoner_Prisoner_Num FOREIGN KEY (Prisoner_Num)
        REFERENCES Prisoner (Prisoner_Num) ON DELETE RESTRICT ON UPDATE RESTRICT;
        
CREATE TABLE Participate
(
    `Program_Num`   VARCHAR(45)    NOT NULL, 
    `Prisoner_Num`  VARCHAR(45)    NOT NULL, 
    PRIMARY KEY (Program_Num, Prisoner_Num)
);

ALTER TABLE Participate
    ADD CONSTRAINT FK_Participate_Prisoner_Num_Prisoner_Prisoner_Num FOREIGN KEY (Prisoner_Num)
        REFERENCES Prisoner (Prisoner_Num) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE Participate
    ADD CONSTRAINT FK_Participate_Program_Num_Program_Program_Num FOREIGN KEY (Program_Num)
        REFERENCES Program (Program_Num) ON DELETE RESTRICT ON UPDATE RESTRICT;
        
CREATE TABLE License
(
    `Prisoner_Num`  VARCHAR(45)    NOT NULL, 
    `Program_Num`   VARCHAR(45)    NOT NULL, 
    `Date`          VARCHAR(45)    NULL, 
    `License_Name`  VARCHAR(45)    NULL, 
    PRIMARY KEY (Prisoner_Num, Program_Num)
);

ALTER TABLE License
    ADD CONSTRAINT FK_License_Prisoner_Num_Prisoner_Prisoner_Num FOREIGN KEY (Prisoner_Num)
        REFERENCES Prisoner (Prisoner_Num) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE License
    ADD CONSTRAINT FK_License_Program_Num_Program_Program_Num FOREIGN KEY (Program_Num)
        REFERENCES Program (Program_Num) ON DELETE RESTRICT ON UPDATE RESTRICT;
        
CREATE TABLE Record
(
    `Money_Manger`  VARCHAR(45)    NOT NULL, 
    `Accout_Num`    VARCHAR(45)    NOT NULL, 
    `Money`         VARCHAR(45)    NULL, 
    PRIMARY KEY (Money_Manger, Accout_Num)
);

ALTER TABLE Record
    ADD CONSTRAINT FK_Record_Accout_Num_Account_Accout_Num FOREIGN KEY (Accout_Num)
        REFERENCES Account (Accout_Num) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE Record
    ADD CONSTRAINT FK_Record_Money_Manger_Employee_Employee_ID FOREIGN KEY (Money_Manger)
        REFERENCES Employee (Employee_ID) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE Dependence
(
    `Prisoner_Num`    VARCHAR(45)    NOT NULL, 
    `Dependent_Name`  VARCHAR(45)    NOT NULL, 
    `Relation`        VARCHAR(45)    NULL, 
    PRIMARY KEY (Prisoner_Num, Dependent_Name)
);

ALTER TABLE Dependence
    ADD CONSTRAINT FK_Dependence_Prisoner_Num_Prisoner_Prisoner_Num FOREIGN KEY (Prisoner_Num)
        REFERENCES Prisoner (Prisoner_Num) ON DELETE RESTRICT ON UPDATE RESTRICT;
