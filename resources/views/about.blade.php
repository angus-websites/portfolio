
@section('title', 'About')
@section('description', 'Learn about this website')

<x-app-layout>
  <!-- About me section -->
  <x-page-container>
    <div class="flex flex-col">
      <article class="prose">
        <h2>About me</h2>
        <p>My name is Angus, I am a recent graduate of The University of Sheffield where I studied computer science.</p>
        <p>I have been coding since I was 12 years old, since then I have written countless programs, learned numerous skills and languages and worked in teams to create real world applications.</p>

        <h3>Hobbies etc</h3>
        <p>In my spare time I like to create websites and other useful applications, I also enjoy other activities such as...</p>
        <ul>
          <li>Archery</li>
          <li>PC Gaming</li>
          <li>Football</li>
          <li>The Gym</li>
          <li>Photography</li>
          <li>Graphic design</li>
        </ul>

      </article>

      <!-- Favourites -->
      <div class="flex flex-col lg:flex-row my-10 gap-10">

        <!-- Languages-->
        <div class="flex-1">
          <article class="prose mb-5">
            <h3>Top 5 languages</h3>
            <p>My five favourite programming languages</p>
          </article>
          <table class="table w-full no-prose">
            <thead>
              <tr>
                <th></th>
                <th>Language</th>
              </tr>
            </thead>
            <tbody class="text-xs sm:text-sm">
              <tr>
                <td>
                  <p><img class="w-6" alt="Python logo" src="{{asset("assets/images/about/languages/python.png")}}"></p>
                </td>
                <td>Python</td>
              </tr>

              <tr>
                <td>
                  <p><img class="w-6" alt="Ruby logo" src="{{asset("assets/images/about/languages/ruby.png")}}"></p>
                </td>
                <td>Ruby</td>
              </tr>

              <tr>
                <td>
                  <p><img class="w-6" alt="PHP logo" src="{{asset("assets/images/about/languages/php.png")}}"></p>
                </td>
                <td>PHP</td>
              </tr>

              <tr>
                <td>
                  <p><img class="w-6" alt="Java logo" src="{{asset("assets/images/about/languages/java.png")}}"></p>
                </td>
                <td>Java</td>
              </tr>

              <tr>
                <td>
                  <p><img class="w-6" alt="Swift logo" src="{{asset("assets/images/about/languages/swift.png")}}"></p>
                </td>
                <td>Swift</td>
              </tr>              

            </tbody>
          </table>
        </div>

        <!-- Software -->
        <div class="flex-1">
          <article class="prose mb-5">
            <h3>Favourite software</h3>
            <p>Here's some of my favoutite software I use on a daily basis</p>
          </article>
          <table class="table w-full no-prose">
            <thead>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Category</th>
              </tr>
            </thead>
            <tbody class="text-xs sm:text-sm">
              <tr>
                <td>
                  <p><img class="w-6" alt="Sublime text logo" src="{{asset("assets/images/about/software/sublime_text.png")}}"></p>
                </td>
                <td>Sublime text</td>
                <td>Text Editor</td>
              </tr>

              <tr>
                <td>
                  <p><img class="w-6" alt="Sublime merge logo" src="{{asset("assets/images/about/software/sublime_merge.png")}}"></p>
                </td>
                <td>Sublime merge</td>
                <td>Git client</td>

              </tr>

              <tr>
                <td>
                  <p><img class="w-6" alt="Tableplus logo" src="{{asset("assets/images/about/software/tableplus.png")}}"></p>
                </td>
                <td>Tableplus</td>
                <td>Database client</td>
              </tr>

              <tr>
                <td>
                  <p><img class="w-6" alt="Affinity Designer logo" src="{{asset("assets/images/about/software/designer.png")}}"></p>
                </td>
                <td>Affinity designer</td>
                <td>Graphic design</td>
              </tr>

              <tr>
                <td>
                  <p><img class="w-6" alt="Pycharm logo" src="{{asset("assets/images/about/software/pycharm.png")}}"></p>
                </td>
                <td>Pycharm</td>
                <td>Python IDE</td>
              </tr>

              <tr>
                <td>
                  <p><img class="w-6" alt="Docker logo" src="{{asset("assets/images/about/software/docker.png")}}"></p>
                </td>
                <td>Docker</td>
                <td>Containerization tool</td>
              </tr>

              

            </tbody>
          </table>
        </div>  
      </div>
    </div>
  </x-page-container>
  <div class="divider"></div> 
  <!-- About website section -->
  <x-page-container>
    <div class="flex flex-col space-y-8 lg:flex-row-reverse">
      <!-- Image -->
      <div class="flex-1 max-w-md">
        <img alt="Macbook pro" src="{{asset("assets/images/about/macbook.png")}}">
      </div>
      <!-- Description -->
      <div class="flex-1">
        <article class="prose">
          <h2>About this site</h2>
          <p>Find out about the technologies and languages that were used to create this site, the code for this site is also available on <a target="_blank" href="https://github.com/angus-websites/portfolio">Github</a>.</p>

          <h3>Backend</h3>
          <p>This site is built using <b>Laravel</b>, a PHP framework for creating modern web applications, data is stored in a MYSQL database and I am using the Eloquent ORM to interact with data from my application. </p>

          <h3> CMS </h3>
          <p>To manage the content of the website I am using a custom built CMS, I can use this to easily create, delete and update information on this site.</p>

          <h3>Frontend</h3> 
          <h4>Styles</h4>
          <p>To style this website I am using <b>Tailwind CSS</b> with Daisy UI components, rendered using Laravel's blade templates.</p>

          <h4>Scripts</h4>
          <p>I am making use of <b>Livewire</b> for AJAX requests to the backend and Alpine JS for any frontend scripts</p>
        </article>
      </div>  
    </div> 

    <div class="my-10">
      <a target="_blank" href="https://www.ecowebhosting.co.uk/" alt="Planting trees every month with Eco Web Hosting" rel="noopener"><img class="mx-auto" src="https://eco-cdn.co.uk/eco-badge-1.svg" alt="Planting trees every month with Eco Web Hosting"></a>
    </div>  
  </x-page-container>

</x-app-layout>
