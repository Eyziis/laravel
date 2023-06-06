$(() => {

    $('#formSearch').on('submit', function (event) {
        event.preventDefault();
        var url = $(this).data('action');
        url += "?nom=" + $('#nomSearch').val();
        url += "&typeRecherche=" + $('input[name="typeRecherche"]:checked').val();
        console.log(url);
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'JSON',
            success: function (response) {
                console.log(response);
                $("#listLocataire").find("tr:gt(0)").remove();
                var locataires = response.locataires;

                locataires.forEach(locataire => {
                    var row = '<tr>';
                    row += '<td>' + locataire.id + '</td>';
                    row += '<td>' + locataire.nom + '</td>';
                    row += '<td>' + locataire.date_e + '</td>';
                    row += '<td>' + (locataire.date_s == null ? '' : locataire.date_s) + '</td>';
                    row += '<td>' + locataire.logement.adresse.rue + "," + locataire.logement.adresse.numero + " " + locataire.logement.adresse.codePostal + "2 " + locataire.logement.adresse.ville + '</td>';
                    row += '<td>' + locataire.reference_prec + '</td>';
                    row += '</tr>';

                    $('#listLocataire').find('tbody').append(row);


                    $('#formSearch').trigger("reset");
                })
            },
            error: function (response) {
                console.log(response);
            }
        });

    });

    $('#modifier').on('click', (e) => {
        $('#valider').attr('value', "update");

        $('#valider').css('display', 'block');
        $('#supprimer').css('display', 'none');
        $('#modifier').css('display', 'none');
        $('#annuler').css('display', 'block');

        $("#id_loc").prop("readonly", false);
        $("#age_loc").prop("readonly", false);
        $("#nom_loc").prop("readonly", false);
        $("#date_e_loc").prop("readonly", false);
        $("#adresse_loc").prop("readonly", false);

    });
    $('#annuler').on('click', (e) => {
        $('#valider').attr('value', "save");

        $('#valider').css('display', 'none');
        $('#supprimer').css('display', 'block');
        $('#modifier').css('display', 'block');
        $('#annuler').css('display', 'none');

        $("#id_loc").prop("readonly", true);
        $("#age_loc").prop("readonly", true);
        $("#nom_loc").prop("readonly", true);
        $("#date_e_loc").prop("readonly", true);
        $("#adresse_loc").prop("readonly", true);

    });
    $('#nouveau').on('click', (e) => {
        $('#valider').attr('value', "save");

        $('#valider').css('display', 'block');
        $('#supprimer').css('display', 'none');
        $('#modifier').css('display', 'none');
        $('#annuler').css('display', 'block');

        $("#age_loc").prop("readonly", false);
        $("#nom_loc").prop("readonly", false);
        $("#date_e_loc").prop("readonly", false);
        $("#adresse_loc").prop("readonly", false);

        $("#id_loc").val('');
        $("#age_loc").val('');
        $("#nom_loc").val('');
        $("#date_e_loc").val('');
        $("#adresse_loc").val('');

    });
    $("tbody tr:nth-child(2)").addClass("selected");
    $("tbody tr").click(function () {
        $('.selected').removeClass('selected');
        $(this).addClass("selected");

        var values = $(this).find('td').map(function() {
            return $(this).text();
        });

        $("#id_loc").val(values[0]);
        $("#age_loc").val(values[2]);
        $("#nom_loc").val(values[1]);
        $("#date_e_loc").val(values[3]);
        $("#adresse_loc").val(values[5]);

    });



})
