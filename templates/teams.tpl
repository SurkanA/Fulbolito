{include 'head.tpl'}
{include 'header.tpl'}

<div class="cont-main">
  <div class="players">
    {foreach from=$teams item=team}
      <div class="card" style="width: 16rem;">
        <a href="team/{$team->id_team}"><img src="{$team->image_url}" class="card-img-top"></a>
        <div class="card-body">
          <a href="team/{$team->id_team}">
            <h5 class="card-title">{$team->team_name}</h5>
          </a>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">City: {$team->city}</li>
          <li class="list-group-item">Year of foundation: {$team->year_founded}</li>
        </ul>
        {if isset($admin) && $admin == "S"}
          <div class="card-body">
            <a href="deleteTeam/{$team->id_team}"><button type="button" class="btn btn-danger"><svg
                  xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                  <path
                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                </svg></button></a>
            <a href="modifyTeam/{$team->id_team}"><button type="button" class="btn btn-warning"><svg
                  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill"
                  viewBox="0 0 16 16">
                  <path
                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                </svg></button></a>
          </div>
        {/if}
      </div>
    {/foreach}
  </div>
  {if isset($admin) && $admin == "S"}
    <div class="container-form">
      <div class="col-md-5 col-lg-8">
        <h4 class="mb-3">Create Team</h4>
        <form class="needs-validation" method="post" action="createTeam" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="team_name" class="form-label">Name</label>
              <input type="text" class="form-control" id="team_name" name="team_name" placeholder="" value=""
                required>
              <div class="invalid-feedback">
                Please enter a name for the team.
              </div>
            </div>
          </div>
          <br>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="year_founded" class="form-label">Year foundation</label>
              <input type="number" min="1850" max="2024" class="form-control" id="year_founded" name="year_founded"
                placeholder="" value="" required>
              <div class="invalid-feedback">
                Select a valid year.
              </div>
            </div>
          </div>
          <br>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="" value="" required>
              <div class="invalid-feedback">
                Please enter a city for the team.
              </div>
            </div>
          </div>
          <br>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="biografia" class="form-label">Biography <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="biografia" name="biografia" placeholder="" value="">
            </div>
          </div>
          <br>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="image_url" class="form-label">Image URL <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="image_url" name="image_url" placeholder="" value="">
            </div>
          </div>
          <br>
          <button class="w-50 btn btn-primary btn-lg" type="submit">Add team</button>
        </form>
      </div>
    </div>
  {/if}
</div>
</main>

{include 'footer.tpl'}