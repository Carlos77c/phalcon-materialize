<div class="page-header">
    <div class="row">
        <div class="col s12">
            <h1>Rick & Morty's Episodes</h1>
        </div>
    </div>
</div>

<div class="" id="cards-view" data-page="1">

    <div class="row flex">
        {% for episode in episodes %}
            <div class="col s4">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">{{ episode.getName() }}</span>
                        <p>{{ episode.getEpisode() }}</p>
                        <p>Air date: {{ episode.getAirdate() }}</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Delete</a>
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>
    <div class="row">
        <div class="col 12">
            <ul class="pagination">
                <li id="first-page-link"  class="disabled">
                    <a href="#!"><i class="material-icons">chevron_left</i></a>
                </li>
                {% for page in 1..4 %}
                    <li class="{% if page == 1 %}active blue-grey {% else %}waves-effect{% endif %}"><a href="#!">{{ page }}</a></li>
                {% endfor %}
                <li id="last-page-link" class="waves-effect">
                    <a href="#!"><i class="material-icons">chevron_right</i></a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="" id="table-view">
    <div class="row">
        <div class="s12">
            <table id="episodes-table" class="responsive-table display">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>airdate</th>
                    <!--<th>Characters</th>-->
                    <th>episode</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>airdate</th>
                    <!--<th>Characters</th>-->
                    <th>episode</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
