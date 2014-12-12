

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          
                      
                  <!-- Default panel contents -->
                  <h1>Все пользователи</h1><hr />
                
                  <!-- Table -->
                  <table class="table table-hover">
                    
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Имя</th>
                            <th>Город</th>
                          </tr>
                        </thead>
                    {foreach from=$post item=item}
                        <tr>
                            <td>{$item.id}</td><td>{$item.email}</td><td>{$item.name}</td><td>{$item.city}</td>
                        </tr>
                    {/foreach}
                    
                    
                    
                    
                  </table>
                  
                
       </div>
       </div>
       </div>         