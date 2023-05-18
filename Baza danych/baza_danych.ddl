
CREATE TABLE nauczyciel (
    id_nauczyciela INTEGER NOT NULL,
    imie           VARCHAR(20) NOT NULL,
    nazwisko       VARCHAR(40) NOT NULL,
    email          VARCHAR(40),
    login          VARCHAR(20) NOT NULL,
    haslo          VARCHAR(40) NOT NULL
);

ALTER TABLE nauczyciel ADD CONSTRAINT nauczyciel_pk PRIMARY KEY ( id_nauczyciela );

CREATE TABLE ocena (
    id_oceny                  INTEGER NOT NULL,
    id_ucznia                 INTEGER NOT NULL,
    ocena                     FLOAT(2) NOT NULL,
    opis                      VARCHAR(1000) NOT NULL,
    id_przedmiotu             INTEGER NOT NULL,
    id_nauczyciela            INTEGER NOT NULL,
    data_otrzymania           DATE NOT NULL,
    uczen_id_ucznia           INTEGER NOT NULL,
    przedmiot_id_przedmiotu   INTEGER NOT NULL,
    nauczyciel_id_nauczyciela INTEGER NOT NULL
);

ALTER TABLE ocena ADD CONSTRAINT ocena_pk PRIMARY KEY ( id_oceny );

CREATE TABLE przedmiot (
    id_przedmiotu INTEGER NOT NULL,
    nazwa         VARCHAR(40) NOT NULL
);

ALTER TABLE przedmiot ADD CONSTRAINT przedmiot_pk PRIMARY KEY ( id_przedmiotu );

CREATE TABLE uczen (
    id_ucznia INTEGER NOT NULL,
    imie      VARCHAR(20) NOT NULL,
    nazwisko  VARCHAR(40) NOT NULL,
    pesel     VARCHAR(11) NOT NULL,
    login     VARCHAR(20) NOT NULL,
    haslo     VARCHAR(40) NOT NULL
);

ALTER TABLE uczen ADD CONSTRAINT uczen_pk PRIMARY KEY ( id_ucznia );

ALTER TABLE ocena
    ADD CONSTRAINT ocena_nauczyciel_fk FOREIGN KEY ( nauczyciel_id_nauczyciela )
        REFERENCES nauczyciel ( id_nauczyciela );

ALTER TABLE ocena
    ADD CONSTRAINT ocena_przedmiot_fk FOREIGN KEY ( przedmiot_id_przedmiotu )
        REFERENCES przedmiot ( id_przedmiotu );

ALTER TABLE ocena
    ADD CONSTRAINT ocena_uczen_fk FOREIGN KEY ( uczen_id_ucznia )
        REFERENCES uczen ( id_ucznia );
