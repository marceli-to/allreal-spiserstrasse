<x-mail::message>
# Neue Interessent/in

<x-mail::table>
|               |                        |
| ------------- |------------------------|
| Vorname       | {{ $data->firstname }} |
| Name          | {{ $data->name }}      |
| E-Mail        | {{ $data->email }}     |
| Telefon       | {{ $data->phone }}     |
| Strasse, Nr   | {{ $data->street ? $data->street : '-' }} {{ $data->street_number ? $data->street_number : '' }} |
| PLZ, Ort      | {{ $data->zip ? $data->zip : '' }} {{ $data->city ? $data->city : '-' }} |



</x-mail::table>

</x-mail::message>
