package com.example.kyrsah;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

public class GraphicActivity extends AppCompatActivity {
    private EditText edPer;
    private Double endAll =0.0;
    private Double endSred =0.0;
    private TextView endSr, EndAll;
    private DatabaseReference mDataBase;
    private String USER_KEY_CONST = "User";


    @Override
    public void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.grafik_activity);
        init();
    }

    private void init() {
        edPer = findViewById(R.id.edPer);
        endSr = findViewById(R.id.endSr);
        EndAll = findViewById(R.id.EndAll);
        mDataBase = FirebaseDatabase.getInstance().getReference(USER_KEY_CONST);
    }
    public void onClickStartStat(View view)
    {
        ValueEventListener vListener = new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot snapshot) {
                int ede = Integer.parseInt(edPer.getText().toString());
                Double CenaV1 = 0.0;
                Double CenaV2 = 0.0;
                Double CenaV3 = 0.0;
                Double Const1 = 0.0;
                Double Const2 = 0.0;
                Double Const3 = 0.0;
                int r = 0;
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
                        break;
                    }
                }
                for (DataSnapshot ds1 : snapshot.getChildren()) {
                    User user = ds1.getValue(User.class);
                    if (user.inf <= ede) {
                        endAll += Const1 + Const2 + Const3 + CenaV1 * user.cold + CenaV2 * user.hot + CenaV3 * user.elc;
                        r += 1;
                    }
                }
                String str = Double.toString(endAll);
                EndAll.setText(str);
                endSred = endAll / (6 * r);
                String str1 = Double.toString(endSred);
                endSr.setText(str1);

            }





            @Override
            public void onCancelled(@NonNull DatabaseError error) {

            }
        };
        mDataBase.addValueEventListener(vListener);
    }
}
