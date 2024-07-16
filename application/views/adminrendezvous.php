            <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                <div class="title-group mb-3">
                    <h1 class="h2 mb-0">List Des Rendez-Vous</h1>
                </div>
                <div class="row my-4">
                    <div class="col-lg-12 col-12">
                        <div id="calendar"></div>
                    </div>
                </div>

            </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: function(fetchInfo, successCallback, failureCallback) {
                    $.ajax({
                        url: 'admin/get_rendezvous',
                        dataType: 'json',
                        success: function(data) {
                            var events = data.map(function(event) {
                                return {
                                    id: event.id,
                                    title: `Client: ${event.client_id}, Service: ${event.id_service}`,
                                    start: event.date_debut,
                                    end: event.date_paiement // adjust this if necessary
                                };
                            });
                            successCallback(events);
                        },
                        error: function() {
                            failureCallback();
                        }
                    });
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>
