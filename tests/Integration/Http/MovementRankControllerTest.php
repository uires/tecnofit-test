<?php

namespace Tests\Integration\Http;

use App\Enum\MovementEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class MovementRankControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    public function test_rota_retorna_ok(): void
    {
        $response = $this->get('/api/show-rank/1');
        $response->assertStatus(200);
    }

    public function test_valida_o_primeiro_no_rank_conforme_seed(): void
    {
        $response = $this->get('/api/show-rank/1');

        /** @var array */
        $result = (array) $response->json();
        $response->assertStatus(200);

        assertEquals(1, $result['movement']['id']);
        assertEquals(MovementEnum::DEADLIFT->value, $result['movement']['name']);

        assertEquals('Jose', $result['movement']['rank'][0]['name_user']);
        assertEquals(2, $result['movement']['rank'][0]['user_id']);
        assertEquals(190, $result['movement']['rank'][0]['value']);
        assertEquals(1, $result['movement']['rank'][0]['general_rank_position']);
    }

    public function test_valida_o_ultimo_no_rank_conforme_seed(): void
    {
        $response = $this->get('/api/show-rank/1');

        /** @var array */
        $result = (array) $response->json();
        $response->assertStatus(200);

        assertEquals(1, $result['movement']['id']);
        assertEquals(MovementEnum::DEADLIFT->value, $result['movement']['name']);

        assertEquals('Joao', $result['movement']['rank'][9]['name_user']);
        assertEquals(1, $result['movement']['rank'][9]['user_id']);
        assertEquals(100, $result['movement']['rank'][9]['value']);
        assertEquals(10, $result['movement']['rank'][9]['general_rank_position']);
    }

    public function test_posicao_rank_para_mesmo_score(): void
    {
        $response = $this->get('/api/show-rank/1');

        /** @var array */
        $result = (array) $response->json();
        $response->assertStatus(200);

        assertEquals(1, $result['movement']['id']);
        assertEquals(MovementEnum::DEADLIFT->value, $result['movement']['name']);

        assertEquals('Jose', $result['movement']['rank'][8]['name_user']);
        assertEquals(2, $result['movement']['rank'][8]['user_id']);
        assertEquals(110, $result['movement']['rank'][8]['value']);
        assertEquals(8, $result['movement']['rank'][8]['general_rank_position']);

        assertEquals('Joao', $result['movement']['rank'][7]['name_user']);
        assertEquals(1, $result['movement']['rank'][7]['user_id']);
        assertEquals(110, $result['movement']['rank'][7]['value']);
        assertEquals(8, $result['movement']['rank'][7]['general_rank_position']);
    }

    public function test_rota_retorna_not_found_ao_enviar_id_nao_existente(): void
    {
        $response = $this->get('/api/show-rank/215544');
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function test_rota_retorna_not_found_quando_nao_envia_id(): void
    {
        $response = $this->get('/api/show-rank/');
        $response->assertStatus(404);
    }
}
