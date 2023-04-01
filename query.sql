-- wybranie imion i nazwisk znajomych gdzie ID usera = 1
SELECT users.name, users.surname FROM users WHERE users.ID IN (SELECT friends.ID_friend from friends WHERE friends.ID_user = 1)

-- wybranie imion i nazwisko znajomych, którzy wysłali zaproszenie dla usera o ID = 2
SELECT users.name, users.surname FROM users WHERE users.ID IN (SELECT friends_request.ID_friend from friends_request WHERE friends_request.ID_user = 2)

-- wybranie tytułu i daty spotkania #użyte w informacjach o spotkaniu
SELECT meetings.title, meetings.date FROM meetings WHERE meetings.ID = 1;

-- wybranie ID, imion i nazwisk osób, które uczestniczą w spotkaniu o ID=8
SELECT users.ID, users.name, users.surname FROM users WHERE users.ID IN (SELECT meetings_members.ID_user FROM meetings_members WHERE meetings_members.ID_meeting = 8);

-- wybranie spotkań dla usera od ID = 2 #użyte na stronie głównej
SELECT meetings.title, meetings.date FROM meetings, meetings_members WHERE meetings_members.ID_user = 2 AND meetings_members.ID_meeting = meetings.ID;

-- wybranie spotkan dla usera od ID = 2 oraz dacie za max tydzień
SELECT meetings.title, meetings.date FROM meetings, meetings_members WHERE meetings_members.ID_user = 2 AND meetings_members.ID_meeting = meetings.ID AND (DAY(CURRENT_TIMESTAMP)-DAY(meetings.date)) < 0 AND (DAY(CURRENT_TIMESTAMP)-DAY(meetings.date)) >= -7 ;

-- wybranie imion i nazwisko użytkoników, których user od ID = 1 nie ma w znajomych oraz nie otrzymał od nich zaproszenia
SELECT users.name, users.surname FROM users WHERE users.ID NOT IN (SELECT friends.ID_friend from friends WHERE friends.ID_user = 1) AND users.ID NOT IN (SELECT friends_request.ID_friend from friends_request WHERE friends_request.ID_user = 1) AND users.ID != 1

-- wybranie tytułów, dat i nazw dni tygodnia spotkań z "numerami" tygodni gdzie uczestnikiem jest user o ID = 2 #użycie na stronie głównej
-- 1 polecenie
SET @@lc_time_names = 'pl_PL'
-- 2 polecenie
SELECT meetings.title, meetings.date, TIMESTAMPDIFF(week,CURRENT_TIMESTAMP,meetings.date) AS `WOFBYTODAY`, DAYNAME(meetings.date) AS day_name FROM meetings, meetings_members WHERE MONTH(CURRENT_TIMESTAMP) = MONTH(meetings.date) AND meetings_members.ID_user = 2 AND meetings_members.ID_meeting = meetings.ID ORDER BY WOFBYTODAY, meetings.date

-- zapytanie pobierające ostatni dzień miesiąca do wyłuskania nazwy pierwszego dnia miesiąca i nazwa miesiąca
SET @@lc_time_names = 'pl_PL'

SELECT LAST_DAY(meetings.date) as last_date, DAYNAME(DATE_FORMAT(meetings.date,'%Y-%m-01')) as day_name_first, MONTHNAME(CURRENT_TIMESTAMP) as month_name FROM meetings LIMIT 1

-- nazwa pierwszego dnia miesiaca do zapytania wyżej
-- https://stackoverflow.com/a/63099018
SELECT LAST_DAY(meetings.date) as last_date, DAYNAME(DATE_FORMAT(meetings.date,'%Y-%m-01')) AS first_date FROM meetings

-- zmiana na polskie nazwy
-- https://www.mysqltutorial.org/mysql-dayname/
SET @@lc_time_names = 'pl_PL'
