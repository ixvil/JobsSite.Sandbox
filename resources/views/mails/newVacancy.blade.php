<p>Title: {{ $vacancy->title }}</p>
<p>Email: {{ $vacancy->email }}</p>
<p>Description: {{ $vacancy->description }}</p>
<p><a href="http://yousite.com/vacancies/approve/{{ $vacancy->id }}">Approve Vacancy</a></p>
<p><a href="http://yousite.com/vacancies/remove/{{ $vacancy->id }}">Delete Vacancy</a></p>