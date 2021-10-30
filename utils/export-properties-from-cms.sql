DROP TABLE IF EXISTS exports.properties;

CREATE TABLE exports.properties as
SELECT
    id,
    address_street,
    street_index,
    google_index,
    address_suburb,
    address_state,
    address_postcode,
    description_type,
    description_beds,
    description_bath,
    description_car,
    people_id,
    options,
    created,
    updated
FROM
    properties;

ALTER TABLE `exports`.`properties`
CHANGE COLUMN `id` `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
ADD PRIMARY KEY (`id`);
