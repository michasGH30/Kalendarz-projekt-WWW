-- wybranie imion i nazwisk znajomych gdzie ID usera = 1
SELECT users.name, users.surname FROM users WHERE users.ID IN (SELECT friends.ID_friend from friends WHERE friends.ID_user = 1)

-- wybranie imion i nazwisko znajomych, którzy wysłali zaproszenie dla usera o ID = 2
SELECT users.name, users.surname FROM users WHERE users.ID IN (SELECT friends_request.ID_friend from friends_request WHERE friends_request.ID_user = 2)

-- wybranie tytułu i daty spotkania oraz imiona i nazwiska osób zaproszonych do spotkania #użyte w informacjach o spotkaniu
SELECT meetings.title, meetings.date, users.name, users.surname FROM meetings, users, meetings_members WHERE meetings.ID = 1 AND users.ID = meetings_members.ID_user;

-- wybranie spotkań dla usera od ID = 2 #użyte na stronie głównej
SELECT meetings.title, meetings.date FROM meetings, meetings_members WHERE meetings_members.ID_user = 2 AND meetings_members.ID_meeting = meetings.ID;

-- wybranie spotkan dla usera od ID = 2 oraz dacie za max tydzień
SELECT meetings.title, meetings.date FROM meetings, meetings_members WHERE meetings_members.ID_user = 2 AND meetings_members.ID_meeting = meetings.ID AND (DAY(CURRENT_TIMESTAMP)-DAY(meetings.date)) < 0 AND (DAY(CURRENT_TIMESTAMP)-DAY(meetings.date)) >= -7 ;

-- wybranie imion i nazwisko użytkoników, których user od ID = 1 nie ma w znajomych oraz nie otrzymał od nich zaproszenia
SELECT users.name, users.surname FROM users WHERE users.ID NOT IN (SELECT friends.ID_friend from friends WHERE friends.ID_user = 1) AND users.ID NOT IN (SELECT friends_request.ID_friend from friends_request WHERE friends_request.ID_user = 1) AND users.ID != 1

-- wybranie tytułów, dat i nazw dni tygodnia spotkań z "numerami" tygodni gdzie uczestnikiem jest user o ID = 2 #użycie na stronie głównej
SELECT meetings.title, meetings.date, TIMESTAMPDIFF(week,CURRENT_TIMESTAMP,meetings.date) AS `WOFBYTODAY`, DAYNAME(meetings.date) AS day_name FROM meetings, meetings_members WHERE MONTH(CURRENT_TIMESTAMP) = MONTH(meetings.date) AND meetings_members.ID_user = 2 AND meetings_members.ID_meeting = meetings.ID ORDER BY WOFBYTODAY, meetings.date