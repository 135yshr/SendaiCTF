CREATE USER 'specialuser'@'%' IDENTIFIED WITH mysql_native_password AS '***';
SET PASSWORD FOR 'specialuser'@'%' = PASSWORD('dbmaster123');
GRANT USAGE ON *.* TO 'specialuser'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT SELECT ON `superapps`.* TO 'specialuser'@'%';
