import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/sign_in_page.dart';
import 'package:frontend/providers/auth_provider.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(const PMWWorkshop());
}

class PMWWorkshop extends StatelessWidget {
  const PMWWorkshop({super.key});

  @override
  Widget build(BuildContext context) {
    return MultiProvider(
      providers: [
        ChangeNotifierProvider(
          create: (context) => AuthProvider(),
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
          home: const SignInPage(),
        );
      }),
    );
  }
}
