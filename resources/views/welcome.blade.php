@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                    <div class="card text-white language-showcase" id="ruby">
                        <div class="card-body">
                            <h5 class="card-title">Ruby</h5>
                            <p class="card-text">An interpretted, dynamically typed programming language.
                            <pre class="code prettyprint">class Animal
  def initialize(sound)
    @sound = sound
  end

  def speak
    puts @sound
  end
end

myAnimal = Animal.new "Squawk!"
myAnimal.speak </pre>
                            </p>
                            <a href="#" class="btn" id="ruby">Installing</a>
                            <a href="#" class="btn btn-primary" id="ruby">Getting Started</a>
                            <a href="#" class="btn btn-primary" id="ruby">Ruby On Rails</a>
                        </div>
                    </div>

                    <div class="card text-white language-showcase" id="python">
                        <div class="card-body">
                            <h5 class="card-title">Python</h5>
                            <p class="card-text">
                                A friendly and easy to learn programming language with dynamic typings, in the object orientated paradigm which is interpretted.
                            <pre class="code prettyprint">class Animal(object):
  def __init__(self, noise):
    self.noise = noise

  def speak(self):
    print(self.noise)

myAnimal = Animal("Oink")
myAnimal.speak() #Oink	</pre>
                            </p>
                            <a href="/python/installation" class="btn" id="python">Installing</a>
                            <a href="#" class="btn btn-primary" id="python">Getting Started</a>
                            <a href="#" class="btn btn-primary" id="python">Flask?</a>
                        </div>
                    </div>

                    <div class="card text-white language-showcase" id="java">
                        <div class="card-body">
                            <h5 class="card-title">Java</h5>
                            <p class="card-text">A language which is compiled into bytecode that can run on any machine with java installed. It is statically typed and object orientate which is very handy.
                            <pre class="code prettyprint">class Animal {
  String sound;

  public Animal(String sound){
    this.sound = sound;
  }

  public void speak(){
    System.out.println(this.sound);
  }
}

class Program {
  public static main(String args[]){
    Animal myAnimal = new Animal("Roar");
    myAnimal.speak();
  }
}        </pre>
                            </p>
                            <a href="#" class="btn" id="java">Installing</a>
                            <a href="#" class="btn btn-primary" id="java">Getting Started</a>
                            <a href="#" class="btn btn-primary" id="java">Minecraft Spigot</a>
                            <a href="#" class="btn btn-primary" id="java">Minecraft Sponge</a>
                        </div>
                    </div>

                    <div class="card text-white language-showcase" id="scala">
                        <div class="card-body">
                            <h5 class="card-title">Scala</h5>
                            <p class="card-text">
                                A language which runs on the Java virtual machine. It is object orientated, uses static type inference and features library pimping.
                            <pre class="code prettyprint">class Animal (sound: String) {
  def speak: Unit = println(sound)
}

object Run {
  def main (args: Array[String]): Unit = {
    var myAnimal: Animal = new Animal("Quack")
    myAnimal speak
  }
}          </pre>
                            </p>
                            <a href="#" class="btn" id="scala">Installing</a>
                            <a href="#" class="btn btn-primary" id="scala">Getting Started</a>
                            <a href="#" class="btn btn-primary" id="scala">Minecraft Spigot</a>
                            <a href="#" class="btn btn-primary" id="scala">Minecraft Sponge</a>
                            <a href="#" class="btn btn-primary" id="scala">Scalatra</a>
                        </div>
                    </div>

                    <div class="card text-white language-showcase" id="php">
                        <div class="card-body">
                            <h5 class="card-title">PHP</h5>
                            <p class="card-text">Some description about this language here
                            <pre class="code prettyprint">class Animal {
  protected $sound = "";

  function __construct(string $sound) {
    $this->sound = $sound;
  }

  function speak(): void {
    echo $this->sound;
  }
}

$myAnimal = new Animal("Buzzzz");
$myAnimal->speak();
  	    	</pre>
                            </p>
                            <a href="#" class="btn" id="php">Installing</a>
                            <a href="#" class="btn btn-primary" id="php">Getting Started</a>
                            <a href="#" class="btn btn-primary" id="php">Laravel</a>
                        </div>
                    </div>

                    <div class="card text-white language-showcase" id="javascript">
                        <div class="card-body">
                            <h5 class="card-title">Javascript</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                            <pre class="code prettyprint">function Animal (sound) {
  this.sound = sound;

  this.speak = function(){
    console.log(sound);
  }
}

var myAnimal = new Animal("Woof");
myAnimal.speak();
	    	</pre>
                            </p>
                            <a href="#" class="btn" id="javascript">Installing</a>
                            <a href="#" class="btn btn-primary" id="javascript">Getting Started</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
