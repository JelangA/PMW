// import 'dart:developer';
import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/attend_page.dart';
import 'package:frontend/pages/sign_in_page.dart';
import 'package:frontend/providers/authentication_provider.dart';
import 'package:frontend/providers/user_provider.dart';
import 'package:frontend/providers/workshop_provider.dart';
import 'package:provider/provider.dart';

final storage = FlutterSecureStorage(webOptions: getWebOptions());
String token = "";

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  LicenseRegistry.addLicense(() async* {
    final license = await rootBundle.loadString('google_fonts/OFL.txt');
    yield LicenseEntryWithLineBreaks(['google_fonts'], license);
  });

  token = await storage.read(
        key: "token",
        webOptions: getWebOptions(),
      ) ??
      "";

  // log("token: $token");
  runApp(const PMWWorkshop());
}

class PMWWorkshop extends StatelessWidget {
  const PMWWorkshop({super.key});

  @override
  Widget build(BuildContext context) {
    return MultiProvider(
      providers: [
        ChangeNotifierProvider(
          create: (context) => AuthenticationProvider(),
        ),
        ChangeNotifierProvider(
          create: (context) => UserProvider(),
        ),
        ChangeNotifierProvider(
          create: (context) => WorkshopProvider(),
        ),
      ],
      child: Builder(builder: (context) {
        return MaterialApp(
          themeMode: ThemeMode.light,
          theme: ThemeData(
            colorScheme: ColorScheme.fromSeed(
              seedColor: primaryColor,
            ),
            useMaterial3: true,
          ),
          debugShowCheckedModeBanner: false,
          home: token.isNotEmpty ? const AttendPage() : const SignInPage(),
        );
      }),
    );
  }
}
