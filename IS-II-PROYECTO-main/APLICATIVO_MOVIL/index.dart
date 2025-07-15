import 'package:flutter/material.dart';
import 'package:url_launcher/url_launcher.dart';
import 'package:dio/dio.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(
    ChangeNotifierProvider(
      create: (context) => AuthModel(),
      builder: (context, child) => const MyApp(),
    ),
  );
}

class AuthModel extends ChangeNotifier {
  String? modalMessage;

  Future<void> login(String email, String password) async {
    try {
      final response = await Dio().post(
        'https://your-php-backend.com/login.php', // Replace with your actual PHP endpoint
        data: {'emailLogin': email, 'passwordLogin': password},
      );

      if (response.statusCode == 200) {
        // Assuming your PHP script returns a success message or a token upon successful login
        modalMessage = (response.data as Map<String, dynamic>)['message'] ?? 'Inicio de sesión exitoso';

        // Navigate to main page on successful login (Implement your main page navigation logic)
        // For example:
        // Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => MainPage()));

      } else {
        modalMessage = 'Error en el inicio de sesión: ${response.statusCode}';
      }
    } catch (e) {
      modalMessage = 'Error de conexión: $e';
    }
    notifyListeners();
  }

  Future<void> register(String nombre, String emailRegistro, String passwordRegistro) async {
    try {
      final response = await Dio().post(
        'https://your-php-backend.com/register.php', // Replace with your actual PHP endpoint
        data: {
          'nombreRegistro': nombre,
          'emailRegistro': emailRegistro,
          'passwordRegistro': passwordRegistro
        },
      );

      if (response.statusCode == 200) {
        modalMessage = (response.data as Map<String, dynamic>)['message'] ?? 'Registro exitoso!';
      } else {
        modalMessage = 'Error en el registro: ${response.statusCode}';
      }
    } catch (e) {
      modalMessage = 'Error de conexión: $e';
    }
    notifyListeners();
  }
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'PRODIGIOS',
      theme: ThemeData(
        fontFamily: 'Poppins',
        primaryColor: const Color(0xFF2c4d90),
        appBarTheme: const AppBarTheme(
          backgroundColor: Color(0xFF2c4d90),
          titleTextStyle: TextStyle(
            color: Colors.white,
            fontSize: 20,
            fontWeight: FontWeight.bold,
          ),
        ),
        textTheme: const TextTheme(
          bodyMedium: TextStyle(fontSize: 16.0),
        ),
        colorScheme: ColorScheme.fromSwatch().copyWith(
          secondary: const Color(0xFF9c9c9c),
        ),
        elevatedButtonTheme: ElevatedButtonThemeData(
          style: ElevatedButton.styleFrom(
            backgroundColor: const Color(0xFF2c4d90),
            foregroundColor: Colors.white,
            textStyle: const TextStyle(fontWeight: FontWeight.bold),
            padding: const EdgeInsets.symmetric(horizontal: 30, vertical: 12),
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(5),
            ),
          ),
        ),
      ),
      home: const MyHomePage(),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key});

  @override
  MyHomePageState createState() => MyHomePageState();
}

class MyHomePageState extends State<MyHomePage> {
  final PageController _pageController = PageController();

  @override
  void dispose() {
    _pageController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('PRODIGIOS'),
        centerTitle: true,
      ),
      drawer: Drawer(
        child: ListView(
          padding: EdgeInsets.zero,
          children: <Widget>[
            const DrawerHeader(
              decoration: BoxDecoration(
                color: Color(0xFF2c4d90),
              ),
              child: Text(
                'PRODIGIOS',
                style: TextStyle(
                  color: Colors.white,
                  fontSize: 24,
                ),
              ),
            ),
            ListTile(
              leading: const Icon(Icons.home, color: Color(0xFF2c4d90)),
              title: const Text('Inicio', style: TextStyle(color: Color(0xFF2c4d90))),
              onTap: () {
                _pageController.animateToPage(0, duration: const Duration(milliseconds: 300), curve: Curves.easeInOut);
                Navigator.pop(context);
              },
            ),
            ListTile(
              leading: const Icon(Icons.music_note, color: Color(0xFF2c4d90)),
              title: const Text('Cursos', style: TextStyle(color: Color(0xFF2c4d90))),
              onTap: () {
                _pageController.animateToPage(1, duration: const Duration(milliseconds: 300), curve: Curves.easeInOut);
                Navigator.pop(context);
              },
            ),
            ListTile(
              leading: const Icon(Icons.person, color: Color(0xFF2c4d90)),
              title: const Text('Instructores', style: TextStyle(color: Color(0xFF2c4d90))),
              onTap: () {
                _pageController.animateToPage(2, duration: const Duration(milliseconds: 300), curve: Curves.easeInOut);
                Navigator.pop(context);
              },
            ),
            ListTile(
              leading: const Icon(Icons.contact_mail, color: Color(0xFF2c4d90)),
              title: const Text('Contacto', style: TextStyle(color: Color(0xFF2c4d90))),
              onTap: () {
                _pageController.animateToPage(3, duration: const Duration(milliseconds: 300), curve: Curves.easeInOut);
                Navigator.pop(context);
              },
            ),
          ],
        ),
      ),
      body: PageView(
        controller: _pageController,
        scrollDirection: Axis.horizontal,
        children: const [
          InicioSection(),
          CursosSection(),
          InstructoresSection(),
          ContactoSection(),
        ],
      ),
      floatingActionButton: Row(
        mainAxisAlignment: MainAxisAlignment.end,
        children: [
          FloatingActionButton(
            heroTag: 'loginButton',
            onPressed: () {
              showDialog(
                context: context,
                builder: (BuildContext context) {
                  return const LoginModal();
                },
              );
            },
            backgroundColor: const Color(0xFF2c4d90),
            child: const Icon(Icons.login, color: Colors.white),
          ),
          const SizedBox(width: 10),
          FloatingActionButton(
            heroTag: 'registerButton',
            onPressed: () {
              showDialog(
                context: context,
                builder: (BuildContext context) {
                  return const RegistroModal();
                },
              );
            },
            backgroundColor: const Color(0xFF2c4d90),
            child: const Icon(Icons.person_add, color: Colors.white),
          ),
        ],
      ),
    );
  }
}

class InicioSection extends StatelessWidget {
  const InicioSection({super.key});

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.all(8.0),
      child: ListView(
        children: const [
          CarouselWithIndicator(
            imgList: [
              "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
              "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
              "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
              "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
              "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
            ],
          ),
        ],
      ),
    );
  }
}

class CarouselWithIndicator extends StatefulWidget {
  final List<String> imgList;

  const CarouselWithIndicator({super.key, required this.imgList});

  @override
  State<StatefulWidget> createState() {
    return _CarouselWithIndicatorState();
  }
}

class _CarouselWithIndicatorState extends State<CarouselWithIndicator> {
  int _current = 0;

  @override
  Widget build(BuildContext context) {
    final double width = MediaQuery.of(context).size.width;
    return Column(children: [
      SizedBox(
        width: width,
        height: 300,
        child: PageView(
          onPageChanged: (index) {
            setState(() {
              _current = index;
            });
          },
          children: widget.imgList.map<Widget>((item) => Image.network(
            item,
            fit: BoxFit.cover,
          )).toList(),
        ),
      ),
      Row(
        mainAxisAlignment: MainAxisAlignment.center,
        children: widget.imgList.map<Widget>((url) {
          int index = widget.imgList.indexOf(url);
          return Container(
            width: 8.0,
            height: 8.0,
            margin: const EdgeInsets.symmetric(vertical: 10.0, horizontal: 2.0),
            decoration: BoxDecoration(
              shape: BoxShape.circle,
              color: _current == index
                  ? const Color.fromRGBO(0, 0, 0, 0.9)
                  : const Color.fromRGBO(0, 0, 0, 0.4),
            ),
          );
        }).toList(),
      ),
    ]);
  }
}

class CursosSection extends StatelessWidget {
  const CursosSection({super.key});

  @override
  Widget build(BuildContext context) {
    return ListView(
      padding: const EdgeInsets.all(16.0),
      children: const [
        SectionTitle(title: 'Nuestros Cursos'),
        CourseAccordion(
          title: 'Piano',
          image: "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
          description:
          'Descubre el arte de tocar el piano, un instrumento fundamental en la música. Nuestros cursos están diseñados para todos los niveles, desde principiantes hasta avanzados. A través de una metodología práctica y divertida, aprenderás desde las bases hasta técnicas complejas, permitiéndote expresar tu creatividad musical y disfrutar de la música de manera plena.',
          extendedDescription:
          'Además de aprender a tocar, profundizarás en la teoría musical, la lectura de partituras y la interpretación de diferentes estilos musicales. Nuestros instructores están comprometidos a guiarte en cada paso de tu viaje musical.',
        ),
        CourseAccordion(
          title: 'Guitarra',
          image: "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
          description:
          'La guitarra es un instrumento versátil y popular en todos los géneros musicales. Nuestras clases están diseñadas para guiarte desde los acordes básicos hasta solos complejos. Aprenderás a tocar tus canciones favoritas, a mejorar tu técnica y a desarrollar tu propio estilo musical.',
          extendedDescription:
          'Además, tendrás la oportunidad de colaborar con otros músicos, participar en presentaciones y disfrutar de un ambiente creativo y motivador. Nuestros instructores experimentados te ayudarán a alcanzar tus metas musicales.',
        ),
        CourseAccordion(
          title: 'Canto',
          image: "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
          description:
          '¿Te apasiona cantar? Nuestras clases de canto están diseñadas para ayudarte a desarrollar tu voz y técnica vocal. Trabajamos en la proyección de la voz, el control de la respiración y la interpretación musical. Desde baladas hasta pop, mejorarás tu habilidad para cantar con confianza y estilo.',
          extendedDescription:
          'Además, aprenderás a interpretar canciones con emoción y a manejar diferentes estilos. Nuestras sesiones están diseñadas para que cada alumno desarrolle su propio estilo y se sienta seguro en el escenario.',
        ),
        CourseAccordion(
          title: 'Violín',
          image: "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
          description:
          'El violín es un instrumento que destaca en la música clásica y contemporánea. Con nuestras clases, aprenderás desde la postura correcta hasta técnicas avanzadas de interpretación. Nuestros instructores te guiarán a través de un viaje musical, ayudándote a dominar el violín y a disfrutar de la música en su forma más pura.',
          extendedDescription:
          'Desarrollarás habilidades para tocar en orquestas y grupos musicales, así como para la interpretación solista. ¡Ven y vive la experiencia musical única que el violín puede ofrecerte!',
        ),
        CourseAccordion(
          title: 'Ukelele',
          image: "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
          description:
          'El ukelele es un instrumento alegre y accesible para todos. En nuestras clases, aprenderás a tocar acordes y canciones de forma divertida. Te enseñaremos desde los fundamentos hasta técnicas avanzadas para que puedas tocar en cualquier ocasión.',
          extendedDescription:
          'Las clases son dinámicas y adaptadas a tus necesidades, fomentando la creatividad y la improvisación. ¡No hay mejor momento que ahora para empezar a disfrutar de la música con el ukelele!',
        ),
        CourseAccordion(
          title: 'Requinto',
          image: "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
          description:
          'El requinto es un instrumento melódico que añade un sabor especial a cualquier estilo musical. En nuestras clases, aprenderás técnicas específicas para tocar el requinto, incluyendo arpegios, acordes y solos. Nuestros instructores experimentados te ayudarán a perfeccionar tu técnica y a explorar la riqueza de este instrumento.',
          extendedDescription:
          'Además, tendrás la oportunidad de tocar con otros músicos y participar en presentaciones, lo que enriquecerá tu experiencia de aprendizaje y te permitirá disfrutar de la música de una manera única.',
        ),
      ],
    );
  }
}

class CourseAccordion extends StatelessWidget {
  final String title;
  final String image;
  final String description;
  final String extendedDescription;

  const CourseAccordion({
    super.key,
    required this.title,
    required this.image,
    required this.description,
    required this.extendedDescription,
  });

  @override
  Widget build(BuildContext context) {
    return Card(
      margin: const EdgeInsets.symmetric(vertical: 8.0),
      child: ExpansionTile(
        title: Text(
          title,
          style: const TextStyle(
            fontSize: 18,
            fontWeight: FontWeight.bold,
            color: Color(0xFF2c4d90),
          ),
        ),
        children: <Widget>[
          Padding(
            padding: const EdgeInsets.all(16.0),
            child: Row(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Image.network(
                  image,
                  width: 100,
                  height: 100,
                  fit: BoxFit.cover,
                ),
                const SizedBox(width: 16),
                Expanded(
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        description,
                        style: const TextStyle(fontSize: 14),
                      ),
                      const SizedBox(height: 8),
                      Text(
                        extendedDescription,
                        style: const TextStyle(fontSize: 14),
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}

class InstructoresSection extends StatelessWidget {
  const InstructoresSection({super.key});

  @override
  Widget build(BuildContext context) {
    return ListView(
      padding: const EdgeInsets.all(16.0),
      children: const [
        SectionTitle(title: 'Nuestros Instructores'),
        InstructorCard(
          name: 'Juan Pérez',
          instrument: 'Piano',
          description: 'Juan es un pianista con más de 10 años de experiencia enseñando a jóvenes y adultos.',
          image: "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
        ),
        InstructorCard(
          name: 'Ana Gómez',
          instrument: 'Canto',
          description: 'Ana ha entrenado a cantantes profesionales y aficionados durante más de 8 años.',
          image: "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
        ),
        InstructorCard(
          name: 'Pedro López',
          instrument: 'Guitarra',
          description: 'Pedro es un experimentado guitarrista que ha enseñado a estudiantes de todos los niveles.',
          image: "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
        ),
        InstructorCard(
          name: 'María Fernández',
          instrument: 'Violín',
          description: 'María es una violinista apasionada que ha trabajado con orquestas juveniles.',
          image: "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
        ),
        InstructorCard(
          name: 'Luisa Rodríguez',
          instrument: 'Ukelele',
          description: 'Luisa enseña a tocar el ukelele de una manera divertida y accesible.',
          image: "https://www.gstatic.com/flutter-onestack-prototype/genui/example_1.jpg",
        ),
      ],
    );
  }
}

class InstructorCard extends StatelessWidget {
  final String name;
  final String instrument;
  final String description;
  final String image;

  const InstructorCard({
    super.key,
    required this.name,
    required this.instrument,
    required this.description,
    required this.image,
  });

  @override
  Widget build(BuildContext context) {
    return Card(
      margin: const EdgeInsets.symmetric(vertical: 8.0),
      child: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            CircleAvatar(
              backgroundImage: NetworkImage(image),
              radius: 50,
            ),
            const SizedBox(height: 10),
            Text(
              name,
              style: const TextStyle(
                fontSize: 18,
                fontWeight: FontWeight.bold,
                color: Color(0xFF2c4d90),
              ),
              textAlign: TextAlign.center,
            ),
            const SizedBox(height: 5),
            Text(
              'Instrumento: $instrument',
              style: const TextStyle(fontSize: 14),
              textAlign: TextAlign.center,
            ),
            const SizedBox(height: 5),
            Text(
              description,
              style: const TextStyle(fontSize: 14),
              textAlign: TextAlign.center,
            ),
          ],
        ),
      ),
    );
  }
}

class ContactoSection extends StatelessWidget {
  const ContactoSection({super.key});

  @override
  Widget build(BuildContext context) {
    return ListView(
      padding: const EdgeInsets.all(16.0),
      children: const [
        SectionTitle(title: 'Contáctanos'),
        ContactMap(),
        ContactForm(),
      ],
    );
  }
}

class ContactMap extends StatelessWidget {
  const ContactMap({super.key});

  @override
  Widget build(BuildContext context) {
    return Card(
      margin: const EdgeInsets.symmetric(vertical: 8.0),
      child: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            const Text(
              'Ubicación',
              style: TextStyle(
                fontSize: 18,
                fontWeight: FontWeight.bold,
                color: Color(0xFF2c4d90),
              ),
              textAlign: TextAlign.center,
            ),
            const SizedBox(height: 10),
            SizedBox(
              width: double.infinity,
              height: 200,
              child: ClipRRect(
                borderRadius: BorderRadius.circular(8.0),
                child: const GoogleMapWidget(),
              ),
            ),
          ],
        ),
      ),
    );
  }
}

class GoogleMapWidget extends StatelessWidget {
  const GoogleMapWidget({super.key});

  @override
  Widget build(BuildContext context) {
    return const Placeholder();
  }
}

class ContactForm extends StatelessWidget {
  const ContactForm({super.key});

  @override
  Widget build(BuildContext context) {
    return Card(
      margin: const EdgeInsets.symmetric(vertical: 8.0),
      child: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            const Text(
              'Formulario de Contacto',
              style: TextStyle(
                fontSize: 18,
                fontWeight: FontWeight.bold,
                color: Color(0xFF2c4d90),
              ),
              textAlign: TextAlign.center,
            ),
            const SizedBox(height: 10),
            TextFormField(
              decoration: const InputDecoration(
                labelText: 'Nombre Completo',
                border: OutlineInputBorder(),
              ),
            ),
            const SizedBox(height: 10),
            TextFormField(
              decoration: const InputDecoration(
                labelText: 'Email',
                border: OutlineInputBorder(),
              ),
            ),
            const SizedBox(height: 10),
            TextFormField(
              decoration: const InputDecoration(
                labelText: 'Mensaje',
                border: OutlineInputBorder(),
              ),
              maxLines: 4,
            ),
            const SizedBox(height: 10),
            ElevatedButton(
              onPressed: () {},
              child: const Text('Enviar'),
            ),
          ],
        ),
      ),
    );
  }
}

class SectionTitle extends StatelessWidget {
  final String title;

  const SectionTitle({super.key, required this.title});

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.symmetric(vertical: 16.0),
      child: Text(
        title,
        style: const TextStyle(
          fontSize: 24,
          fontWeight: FontWeight.bold,
          color: Color(0xFF2c4d90),
        ),
        textAlign: TextAlign.center,
      ),
    );
  }
}

class LoginModal extends StatefulWidget {
  const LoginModal({super.key});

  @override
  LoginModalState createState() => LoginModalState();
}

class LoginModalState extends State<LoginModal> {
  final _emailController = TextEditingController();
  final _passwordController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return AlertDialog(
      title: const Text('Iniciar Sesión', style: TextStyle(color: Color(0xFF2c4d90))),
      content: Column(
        mainAxisSize: MainAxisSize.min,
        children: [
          TextFormField(
            controller: _emailController,
            decoration: const InputDecoration(
              labelText: 'Email',
              border: OutlineInputBorder(),
            ),
          ),
          const SizedBox(height: 10),
          TextFormField(
            controller: _passwordController,
            decoration: const InputDecoration(
              labelText: 'Contraseña',
              border: OutlineInputBorder(),
            ),
            obscureText: true,
          ),
          const SizedBox(height: 20),
          Consumer<AuthModel>(
            builder: (context, authModel, child) {
              return ElevatedButton(
                onPressed: () async {
                  await authModel.login(_emailController.text, _passwordController.text);
                  if (context.mounted) {
                    Navigator.pop(context); // Close the modal
                    if (authModel.modalMessage != null) {
                      showDialog(
                        context: context,
                        builder: (context) => AlertDialog(
                          title: const Text('Mensaje'),
                          content: Text(authModel.modalMessage!),
                          actions: [
                            TextButton(
                              onPressed: () {
                                Navigator.pop(context);
                              },
                              child: const Text('Aceptar'),
                            ),
                          ],
                        ),
                      );
                    }
                  }
                },
                child: const Text('Iniciar Sesión'),
              );
            },
          ),
        ],
      ),
    );
  }

  @override
  void dispose() {
    _emailController.dispose();
    _passwordController.dispose();
    super.dispose();
  }
}

class RegistroModal extends StatefulWidget {
  const RegistroModal({super.key});

  @override
  RegistroModalState createState() => RegistroModalState();
}

class RegistroModalState extends State<RegistroModal> {
  final _nombreController = TextEditingController();
  final _emailController = TextEditingController();
  final _passwordController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return AlertDialog(
      title: const Text('Registrarse', style: TextStyle(color: Color(0xFF2c4d90))),
      content: Column(
        mainAxisSize: MainAxisSize.min,
        children: [
          TextFormField(
            controller: _nombreController,
            decoration: const InputDecoration(
              labelText: 'Nombre Completo',
              border: OutlineInputBorder(),
            ),
          ),
          const SizedBox(height: 10),
          TextFormField(
            controller: _emailController,
            decoration: const InputDecoration(
              labelText: 'Email',
              border: OutlineInputBorder(),
            ),
          ),
          const SizedBox(height: 10),
          TextFormField(
            controller: _passwordController,
            decoration: const InputDecoration(
              labelText: 'Contraseña',
              border: OutlineInputBorder(),
            ),
            obscureText: true,
          ),
          const SizedBox(height: 20),
          Consumer<AuthModel>(
            builder: (context, authModel, child) {
              return ElevatedButton(
                onPressed: () async {
                  await authModel.register(
                      _nombreController.text, _emailController.text, _passwordController.text);

                  if (context.mounted) {
                    Navigator.pop(context);

                    if (authModel.modalMessage != null) {
                      showDialog(
                        context: context,
                        builder: (context) => AlertDialog(
                          title: const Text('Mensaje'),
                          content: Text(authModel.modalMessage!),
                          actions: [
                            TextButton(
                              onPressed: () {
                                Navigator.pop(context);
                              },
                              child: const Text('Aceptar'),
                            ),
                          ],
                        ),
                      );
                    }
                  }
                },
                child: const Text('Registrarse'),
              );
            },
          ),
        ],
      ),
    );
  }

  @override
  void dispose() {
    _nombreController.dispose();
    _emailController.dispose();
    _passwordController.dispose();
    super.dispose();
  }
}