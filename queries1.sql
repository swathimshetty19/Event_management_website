/*1.calculate amnt sponsored for an event( say amittrivedi concert)*/
select sum(amount) from sponsorer where sponsored_event='amittrivedi';


/*2.calculate amnt sponsored for each event*/---------------A
select sponsored_event,sum(amount) from sponsorer group by sponsored_event;

/* 3.total no of tickets sold for a payable evnt x say amit trivedi*/

select sum(no_of_tickets) from ticket,booking,p_event where student_id=student_id1 and event_id6=P_event_id and P_event_name='Amittrivedi';

/*4.total no of tickets sold for each event*/
select P_event_name,sum(no_of_tickets) from ticket,booking,p_event where student_id=student_id1 and event_id6=P_event_id group by P_event_name;

/* 5.total number of groups participating in a non payable event say pes pubg tounament*/
select count(distinct(teamname)) from group_members_project,np_event where N_event_name='Pes Pubg Tournament' and event_id5=N_event_id;

/*6..total number of students participating in a non payable event say talent show*/
select count(P_member_id) from group_members_project,np_event where N_event_name='Talent show' and event_id5=N_event_id;




/*7.Total amount spent on prizes for each event*/
select N_event_name,sum(prize_amt) from prizes,np_event where N_event_id=event_id2 group by N_event_name;



/*8.price of an event (a student wants to know the ticket price for amittrivedi concert)*/**************

select ticket_price from p_event where P_event_name='Amittrivedi';




/*9.. total amount gained for each event(admin)*/????
select P_event_name,sum(price) from ticket,booking,p_event where student_id=student_id1 and event_id6=P_event_id group by P_event_name;


/* 10.total amount gained in a fest through tickets */
select fest_name,sum(price) from fest,ticket,p_event,booking where event_id6=P_event_id and student_id=student_id1 and fest_id=fest_id2 group by fest_name;


/*11.If the admin wants to change the ticket price for a payable event(for example stand up tickets increase to 350 from now on)*/
update p_event set ticket_price=350 where P_event_name='Varun Thakur';




/*12.nested:display all organisers of a particular fest(to send mails / to call for meetings)*/
SELECT org_id,org_name from organiser where org_id IN
( SELECT org_id1 from organise_p,fest,p_event where event_id3=P_event_id and fest_id2=fest_id and fest_name='aatmatrisha19' 
UNION SELECT org_id2 from organise_n,fest,np_event where event_id4=N_event_id and fest_id1=fest_id and fest_name='aatmatrisha19');

/*13.all events taking place in this month and which fest they belong to (example march)*/
select P_event_name,fest_name,P_event_date from p_event,fest where fest_id2=fest_id and P_event_date LIKE '2019-03%' 
UNION
select N_event_name,fest_name,N_event_date from np_event,fest where fest_id1=fest_id and N_event_date LIKE '2019-03%' 

/*14.nested:all organisers organising events of the CS department*/
select org_id,org_name from organiser where org_id IN( SELECT org_id1 from organise_p,p_event where event_id3=P_event_id and P_department='CS' UNION SELECT org_id2 from organise_n,fest,np_event where event_id4=N_event_id and N_department='CS')


/*15.display all events a student is participating in->when the student logs in into his account, 
we can show these details*/************************************
select P_event_name from p_event,booking where P_event_id=event_id6 and student_id1='pesstu1001'
UNION
select N_event_name from np_event,group_members_project where N_event_id=event_id5 and P_member_id='pesstu1001';

/*16.display all the events belonging to a fest*/
select P_event_name,P_event_date from p_event,fest where fest_id2=fest_id and fest_name='aatmatrisha19' 
UNION
select N_event_name,N_event_date from np_event,fest where fest_id1=fest_id and fest_name='aatmatrisha19'  

/*17.cancel participation in a non-payable event*/******************************
delete from group_members_project where P_member_name='yadhav';
 

/*18.button->prize updates->gives all prize details*/
SELECT winner_name,rank_secured,prize_amt,N_event_name,N_department,N_event_type,fest_name from np_event,prizes,fest where N_event_id=event_id2 and fest_id=fest_id1;


/*19. nested: give a hike of 10000 to those events who have been sponsored by just one sponsorer*/
update sponsorer as t1 set amount=amount+10000 where sponsored_event IN
 (select sponsored_event from (select * from sponsorer) as t2 group by sponsored_event having count(sponsored_event)=1)

/* 20.nested: a team withdraws participation*/******************************************
delete from group_members_project where P_member_id IN ( select P_member_id where teamname='abc');

/* 21.nested: a stall team withdraws participation -- deletion should happen in 2 tables*/
delete from group_members_stall where stall_id3 IN ( select stall_id from stalls where stall_name='4');
delete from stalls where stall_name='4';

