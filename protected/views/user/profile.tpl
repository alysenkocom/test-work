

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          
                      
                <h1>Личная страница</h1>
 
                <h3>Личные данные:</h3>
                {foreach from=$post item=item}
                    <b>Email:</b> {$item.email}<br />
                    <b>Имя:</b> {$item.name}<br />
                    <b>Город:</b> {$item.city}<br />
                {/foreach}     

                
       </div>
       </div>
       </div>         