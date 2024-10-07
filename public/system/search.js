const search = document.querySelectorAll('.input-g input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

search.forEach(input => {
    input.addEventListener('input', searchTable);
});

function searchTable() {
    const searchValue = this.value.toLowerCase();

    table_rows.forEach((row, i) => {
        const table_data = row.textContent.toLowerCase();
        row.classList.toggle('hide', !table_data.includes(searchValue));
        row.style.setProperty('--delay', i/25 + 's')
    });

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b' ;
    });
}

table_headings.forEach((head, i)=> {
    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        });

        head.classList.toggle('asc', sort_asc)
        sort_asc = head.classList.contains('asc') ? false : true;

        sorTable(i, sort_asc);
    }
})

function sorTable(column, sort_asc) {
    const tbody = document.querySelector('tbody'); // Selecciona el primer tbody encontrado
    tbody.innerHTML = ''; // Limpia el contenido actual del tbody

    [...table_rows].sort((a,b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    })
    .forEach(sorted_row => {
        tbody.appendChild(sorted_row); // Agrega cada fila ordenada al tbody
    });
}

