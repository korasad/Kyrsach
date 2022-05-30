package com.example.kyrsah;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

public class MainActivity extends AppCompatActivity {
    private EditText etEleck, etHotWater, etColdWater;
    private TextView potracheno;
    private int num=0;
    private DatabaseReference mDataBase;
    private String USER_KEY = "User";


    private void init()
    {
        etEleck = findViewById(R.id.etEleck);
        etHotWater = findViewById(R.id.etHotWater);
        etColdWater = findViewById(R.id.etColdWater);
        potracheno = findViewById(R.id.potracheno);
        mDataBase = FirebaseDatabase.getInstance().getReference(USER_KEY);

    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        init();
    }
    public void onClickSave(View view)
    {
        String id = mDataBase.getKey();
        int inf = num+1;
        String inf1 = "Inform";
        double cold = Double.parseDouble(etColdWater.getText().toString());
        double hot = Double.parseDouble(etHotWater.getText().toString());
        double elc = Double.parseDouble(etEleck.getText().toString());
        User newUser = new User(id, inf1, cold, hot, elc, inf);
        mDataBase.push().setValue(newUser);
        Toast.makeText(this, "Сохранено!", Toast.LENGTH_SHORT).show();
        potratil(cold, hot, elc);
    }
    public void onClickGraf(View view)
    {
        Intent i = new Intent(MainActivity.this, GraphicActivity.class);
        startActivity(i);
    }
    public void onClickConst(View view)
    {
        Intent i = new Intent(MainActivity.this, ConstActivity.class);
        startActivity(i);
    }
    public void potratil(double cold, double hot, double elc)
    {
        ValueEventListener vListener = new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot snapshot) {


                Double CenaV1 = 0.0;
                Double CenaV2 = 0.0;
                Double CenaV3 = 0.0;
                Double Const1 = 0.0;
                Double Const2 = 0.0;
                Double Const3 = 0.0;
                Double ConstAll = 0.0;
                double r = 0.0;
                for (DataSnapshot ds : snapshot.getChildren()) {
                    Ceni ceni = ds.getValue(Ceni.class);
                    if (ceni.Cena != null) {
                        CenaV1 = ceni.CenaW1;
                        CenaV2 = ceni.CenaW2;
                        CenaV3 = ceni.CenaW3;
                        break;
                    }
                }
                for (DataSnapshot ds2 : snapshot.getChildren()) {
                    Consti consti = ds2.getValue(Consti.class);
                    if (consti.Constant != null) {
                        Const1 = consti.Home;
                        Const2 = consti.Inter;
                        Const3 = consti.Tel;
                        ConstAll = Const1+Const2+Const3;
                        break;
                    }
                }
                for (DataSnapshot ds1 : snapshot.getChildren()) {
                    User user = ds1.getValue(User.class);
                    if ((user.inf == (num-1))&&(cold>=user.cold)&&(hot>=user.hot)&&(elc>=user.elc)) {
                        r = ConstAll + CenaV1 * (cold - user.cold) + CenaV2 * (hot - user.cold) + CenaV3 * (elc - user.elc);
                    }
                    else
                    {
                        r = Const1 + Const2 + Const3 + CenaV1 * cold + CenaV2 * hot + CenaV3 * elc;
                    }

                }

                String str = Double.toString(r);
                potracheno.setText(str);

            }
            @Override
            public void onCancelled(@NonNull DatabaseError error) {

            }
        };
        mDataBase.addValueEventListener(vListener);


    }
}