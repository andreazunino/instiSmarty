PGDMP                         |            gmpiwplq "   13.10 (Ubuntu 13.10-1.pgdg20.04+1)    15.3 '    "           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            #           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            $           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            %           1262    2902410    gmpiwplq    DATABASE     t   CREATE DATABASE gmpiwplq WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.UTF-8';
    DROP DATABASE gmpiwplq;
                gmpiwplq    false            &           0    0    DATABASE gmpiwplq    ACL     ;   REVOKE CONNECT,TEMPORARY ON DATABASE gmpiwplq FROM PUBLIC;
                   gmpiwplq    false    4133                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                postgres    false            '           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   postgres    false    25            (           0    0    SCHEMA public    ACL     Q   REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;
                   postgres    false    25            �            1259    5404813    boletin    TABLE     �   CREATE TABLE public.boletin (
    id integer NOT NULL,
    id_curso integer NOT NULL,
    dni_estudiante integer NOT NULL,
    notas jsonb DEFAULT '[]'::jsonb
);
    DROP TABLE public.boletin;
       public         heap    gmpiwplq    false    25            �            1259    5404811    boletin_id_seq    SEQUENCE     �   CREATE SEQUENCE public.boletin_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.boletin_id_seq;
       public          gmpiwplq    false    233    25            )           0    0    boletin_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.boletin_id_seq OWNED BY public.boletin.id;
          public          gmpiwplq    false    232            �            1259    2902411    curso    TABLE     q   CREATE TABLE public.curso (
    nombre character varying,
    id integer NOT NULL,
    cupo integer DEFAULT 0
);
    DROP TABLE public.curso;
       public         heap    gmpiwplq    false    25            �            1259    3743635    curso_id_seq    SEQUENCE     �   CREATE SEQUENCE public.curso_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.curso_id_seq;
       public          gmpiwplq    false    25    226            *           0    0    curso_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.curso_id_seq OWNED BY public.curso.id;
          public          gmpiwplq    false    230            �            1259    2902419 
   estudiante    TABLE     �   CREATE TABLE public.estudiante (
    dni integer NOT NULL,
    nombre character varying,
    apellido character varying,
    email character varying
);
    DROP TABLE public.estudiante;
       public         heap    gmpiwplq    false    25            �            1259    2902427    inscripcion    TABLE     �   CREATE TABLE public.inscripcion (
    id_curso integer,
    dni_estudiante integer,
    id integer NOT NULL,
    calificacion real,
    fecha_calificacion date
);
    DROP TABLE public.inscripcion;
       public         heap    gmpiwplq    false    25            �            1259    3743647    inscripcion_id_seq    SEQUENCE     �   CREATE SEQUENCE public.inscripcion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.inscripcion_id_seq;
       public          gmpiwplq    false    25    228            +           0    0    inscripcion_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.inscripcion_id_seq OWNED BY public.inscripcion.id;
          public          gmpiwplq    false    231            �            1259    3741606    serial    SEQUENCE     n   CREATE SEQUENCE public.serial
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;
    DROP SEQUENCE public.serial;
       public          gmpiwplq    false    25            �           2604    5404816 
   boletin id    DEFAULT     h   ALTER TABLE ONLY public.boletin ALTER COLUMN id SET DEFAULT nextval('public.boletin_id_seq'::regclass);
 9   ALTER TABLE public.boletin ALTER COLUMN id DROP DEFAULT;
       public          gmpiwplq    false    232    233    233            �           2604    3743637    curso id    DEFAULT     d   ALTER TABLE ONLY public.curso ALTER COLUMN id SET DEFAULT nextval('public.curso_id_seq'::regclass);
 7   ALTER TABLE public.curso ALTER COLUMN id DROP DEFAULT;
       public          gmpiwplq    false    230    226            �           2604    3743649    inscripcion id    DEFAULT     p   ALTER TABLE ONLY public.inscripcion ALTER COLUMN id SET DEFAULT nextval('public.inscripcion_id_seq'::regclass);
 =   ALTER TABLE public.inscripcion ALTER COLUMN id DROP DEFAULT;
       public          gmpiwplq    false    231    228                      0    5404813    boletin 
   TABLE DATA           F   COPY public.boletin (id, id_curso, dni_estudiante, notas) FROM stdin;
    public          gmpiwplq    false    233   �)                 0    2902411    curso 
   TABLE DATA           1   COPY public.curso (nombre, id, cupo) FROM stdin;
    public          gmpiwplq    false    226   �)                 0    2902419 
   estudiante 
   TABLE DATA           B   COPY public.estudiante (dni, nombre, apellido, email) FROM stdin;
    public          gmpiwplq    false    227   �*                 0    2902427    inscripcion 
   TABLE DATA           e   COPY public.inscripcion (id_curso, dni_estudiante, id, calificacion, fecha_calificacion) FROM stdin;
    public          gmpiwplq    false    228   T+       ,           0    0    boletin_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.boletin_id_seq', 1, false);
          public          gmpiwplq    false    232            -           0    0    curso_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.curso_id_seq', 51, true);
          public          gmpiwplq    false    230            .           0    0    inscripcion_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.inscripcion_id_seq', 396, true);
          public          gmpiwplq    false    231            /           0    0    serial    SEQUENCE SET     5   SELECT pg_catalog.setval('public.serial', 0, false);
          public          gmpiwplq    false    229            �           2606    5404822    boletin boletin_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.boletin
    ADD CONSTRAINT boletin_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.boletin DROP CONSTRAINT boletin_pkey;
       public            gmpiwplq    false    233            �           2606    3743639    curso curso_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.curso
    ADD CONSTRAINT curso_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.curso DROP CONSTRAINT curso_pkey;
       public            gmpiwplq    false    226            �           2606    2902426    estudiante estudiante_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.estudiante
    ADD CONSTRAINT estudiante_pkey PRIMARY KEY (dni);
 D   ALTER TABLE ONLY public.estudiante DROP CONSTRAINT estudiante_pkey;
       public            gmpiwplq    false    227            �           2606    3743651    inscripcion inscripcion_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.inscripcion
    ADD CONSTRAINT inscripcion_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.inscripcion DROP CONSTRAINT inscripcion_pkey;
       public            gmpiwplq    false    228            �           2606    3744097    inscripcion unique_inscripcion 
   CONSTRAINT     m   ALTER TABLE ONLY public.inscripcion
    ADD CONSTRAINT unique_inscripcion UNIQUE (id_curso, dni_estudiante);
 H   ALTER TABLE ONLY public.inscripcion DROP CONSTRAINT unique_inscripcion;
       public            gmpiwplq    false    228    228            �           2606    5404828 #   boletin boletin_dni_estudiante_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.boletin
    ADD CONSTRAINT boletin_dni_estudiante_fkey FOREIGN KEY (dni_estudiante) REFERENCES public.estudiante(dni);
 M   ALTER TABLE ONLY public.boletin DROP CONSTRAINT boletin_dni_estudiante_fkey;
       public          gmpiwplq    false    233    3978    227            �           2606    5404823    boletin boletin_id_curso_fkey    FK CONSTRAINT     }   ALTER TABLE ONLY public.boletin
    ADD CONSTRAINT boletin_id_curso_fkey FOREIGN KEY (id_curso) REFERENCES public.curso(id);
 G   ALTER TABLE ONLY public.boletin DROP CONSTRAINT boletin_id_curso_fkey;
       public          gmpiwplq    false    233    226    3976            �           2606    3743656     inscripcion fk_inscripcion_curso    FK CONSTRAINT     �   ALTER TABLE ONLY public.inscripcion
    ADD CONSTRAINT fk_inscripcion_curso FOREIGN KEY (id_curso) REFERENCES public.curso(id);
 J   ALTER TABLE ONLY public.inscripcion DROP CONSTRAINT fk_inscripcion_curso;
       public          gmpiwplq    false    3976    228    226            �           2606    2902437 +   inscripcion inscripcion_dni_estudiante_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.inscripcion
    ADD CONSTRAINT inscripcion_dni_estudiante_fkey FOREIGN KEY (dni_estudiante) REFERENCES public.estudiante(dni);
 U   ALTER TABLE ONLY public.inscripcion DROP CONSTRAINT inscripcion_dni_estudiante_fkey;
       public          gmpiwplq    false    227    3978    228                  x������ � �         �   x�]�=n� ���� ���H$K�(�fB�C���r��[���X���(��}���=��.�}�&�G+��KBP#��3�A�p~b���B?�`�:R\��쪜��r�"��� ��F�m��4y]�l���.�3{�_C-��Q�������J�|HH��y�+��&���3(���A�Q�G��%��!P�`hO~ͩ&	ԡ�����]�)7�䞮v����&'V��x��40t�v�c�� LrW         �   x�326BN����+|J3�9R�sR�9sK�3�� \����������\.CccC����24AN�Ģ�|�)�U��@NfI~�C:\��%�S��9��s��
@l$%��Ƙ��:�������31/�(5���4/3/�C2+F��� ��JM         F   x�E���0�K/�0��&R����A�;f�&�4�5��gd��(���`�$�@���ZxU2��k�ED	�     